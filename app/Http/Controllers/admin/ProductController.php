<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Based;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductPicture;
use App\Models\ProductStack;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // untuk deteksi session
        detect_role_session($this->session, session()->has('roles'), 'admin');
    }

    public function index()
    {
        return Template::load($this->session['roles'], 'Product', 'product', 'view');
    }

    public function add()
    {
        $data = [
            'type'  => Type::all(),
            'based' => Based::all(),
            'price' => Price::all(),
        ];

        return Template::load($this->session['roles'], 'Tambah Product', 'product', 'add', $data);
    }

    public function upd($id)
    {
        $data = [
            'type'    => Type::all(),
            'based'   => Based::all(),
            'price'   => Price::all(),
            'product' => Product::findOrFail(my_decrypt($id)),
        ];

        return Template::load($this->session['roles'], 'Ubah Product', 'product', 'upd', $data);
    }

    public function det($id)
    {
        $data = [
            'product' => Product::findOrFail(my_decrypt($id)),
        ];

        return Template::load($this->session['roles'], 'Detail Product', 'product', 'det', $data);
    }

    public function get_data_dt()
    {
        $data = Product::latest('updated_at')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('type', function ($row) {
                return $row->toType->nama;
            })
            ->addColumn('based', function ($row) {
                return $row->toBased->nama;
            })
            ->addColumn('price', function ($row) {
                return ucfirst($row->toPrice->jenis) . ' | ' . rupiah($row->toPrice->nilai_normal);
            })
            ->addColumn('gambar', function ($row) {
                return '<img src="' . asset_upload('picture/' . $row->gambar) . '" class="img-fluid" width="100px">';
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('product.det', my_encrypt($row->id_product)) . '" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>&nbsp;
                    <a href="' . route('product.upd', my_encrypt($row->id_product)) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_product) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
                ';
            })
            ->rawColumns(['gambar', 'action'])
            ->make(true);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        try {
            $post = $request->all();

            foreach ($post as $key => $value) {
                $data[$key] = $value;
            }

            if ($request->id_product === null) {
                $rules['gambar']          = 'required';
                $rules['product_picture'] = 'required';

                $messages['gambar.required']          = 'Gambar harus diisi!';
                $messages['product_picture.required'] = 'Gambar Detail harus diisi!';
            } else {
                if (isset($request->change_picture) && $request->change_picture === 'on') {
                    $rules['gambar'] = 'required';

                    $messages['gambar.required'] = 'Gambar harus diisi!';
                }
            }

            $rules['judul']           = 'required';
            $rules['id_type']         = 'required';
            $rules['id_based']        = 'required';
            $rules['id_price']        = 'required';
            $rules['product_stack']   = 'required';
            $rules['deskripsi']       = 'required';

            $messages['judul.required']           = 'Judul harus diisi!';
            $messages['id_type.required']         = 'Type harus diisi!';
            $messages['id_based.required']        = 'Based harus diisi!';
            $messages['id_price.required']        = 'Price harus diisi!';
            $messages['product_stack.required']   = 'Stack harus diisi!';
            $messages['deskripsi.required']       = 'Deskripsi harus diisi!';

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

                return Response::json($response);
            }

            if ($request->id_product === null) {
                $nama_gambar = add_picture($request->gambar);

                // product
                $product = new Product();
                $product->judul       = $request->judul;
                $product->id_type     = $request->id_type;
                $product->id_based    = $request->id_based;
                $product->id_price    = $request->id_price;
                $product->deskripsi   = $request->deskripsi;
                $product->link_demo   = $request->link_demo;
                $product->link_github = $request->link_github;
                $product->gambar      = $nama_gambar;
                $product->by_users    = $this->session['id_users'];
                $product->save();

                // product stack
                $stacks = $request->product_stack;
                for ($i = 0; $i < count($stacks); $i++) {
                    $product_stack[] = [
                        'id_product' => $product->id_product,
                        'id_stack'   => $stacks[$i],
                        'by_users'   => $this->session['id_users'],
                    ];
                }
                ProductStack::insert($product_stack);

                // product picture
                $pictures = $request->product_picture;
                for ($i = 0; $i < count($pictures); $i++) {
                    $nama_foto[$i] = add_picture($request->product_picture[$i]);

                    $product_picture[] = [
                        'id_product' => $product->id_product,
                        'picture'    => $nama_foto[$i],
                        'by_users'   => $this->session['id_users'],
                    ];
                }
                ProductPicture::insert($product_picture);
                DB::commit();

                $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
            } else {
                // product
                $product = Product::find($request->id_product);

                if (isset($request->change_picture) && $request->change_picture === 'on') {
                    $nama_gambar     = upd_picture($request->gambar, $product->gambar);
                    $product->gambar = $nama_gambar;
                }

                $product->judul     = $request->judul;
                $product->id_type   = $request->id_type;
                $product->id_based  = $request->id_based;
                $product->id_price  = $request->id_price;
                $product->deskripsi = $request->deskripsi;
                $product->link_demo = $request->link_demo;
                $product->link_github = $request->link_github;
                $product->by_users  = $this->session['id_users'];
                $product->save();

                // product stack
                $find_product_stack = ProductStack::whereIdProduct($request->id_product);
                $find_product_stack->delete();

                $stacks = $request->product_stack;
                for ($i = 0; $i < count($stacks); $i++) {
                    $product_stack[] = [
                        'id_product' => $request->id_product,
                        'id_stack'   => $stacks[$i],
                        'by_users'   => $this->session['id_users'],
                    ];
                }
                ProductStack::insert($product_stack);

                // product picture
                $pictures = $request->product_picture;
                if ($pictures !== null) {
                    for ($i = 0; $i < count($pictures); $i++) {
                        $nama_foto[$i] = add_picture($request->product_picture[$i]);

                        $product_picture[] = [
                            'id_product' => $product->id_product,
                            'picture'    => $nama_foto[$i],
                            'by_users'   => $this->session['id_users'],
                        ];
                    }
                    ProductPicture::insert($product_picture);
                }
                DB::commit();

                $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
            }
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Simpan!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }

    public function del(Request $request)
    {
        try {
            $data = Product::with(['toProductPicture'])->find(my_decrypt($request->id));

            del_picture($data->gambar);

            foreach ($data->toproductPicture as $key => $value) {
                del_picture($value->picture);
            }

            $data->delete();

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Hapus!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Hapus!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }

    public function get_stack_detail($id)
    {
        $get = ProductStack::with('toStack')->whereIdProduct($id)->get();

        $response = [];

        foreach ($get as $value) {
            $response[] = $value->id_stack;
        }

        return Response::json($response);
    }

    public function get_picture_detail($id)
    {
        $get = ProductPicture::whereIdProduct($id)->get();

        $response = [];

        foreach ($get as $value) {
            $response[] = [
                'id_product_picture' => $value->id_product_picture,
                'picture'            => $value->picture,
            ];
        }

        return Response::json($response);
    }

    public function del_picture_detail(Request $request)
    {
        try {
            $data = ProductPicture::find($request->id);

            del_picture($data->picture);

            $data->delete();

            $response = ['title' => 'Berhasil!', 'text' => 'Gambar Sukses di Hapus!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Gambar Gagal di Hapus!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
