<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Master</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Produk & Project</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.based.index') }}">
                                <i class="bx bx-box"></i>
                                <span>Based</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.stack.index') }}">
                                <i class="bx bx-box"></i>
                                <span>Stack</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.type.index') }}">
                                <i class="bx bx-box"></i>
                                <span>Type</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.price.index') }}">
                                <i class="bx bx-box"></i>
                                <span>Price</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Article</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="#">
                                <i class="bx bx-box"></i>
                                <span>Tag</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.social_media.index') }}" class="waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Social Media</span>
                    </a>
                </li>
                <li class="menu-title">Pustaka</li>
                <li>
                    <a href="{{ route('admin.product.index') }}" class="waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.project.index') }}" class="waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Project</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Article</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.contact.index') }}" class="waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Contact</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.testimony.index') }}" class="waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Testimony</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>