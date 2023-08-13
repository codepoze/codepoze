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
                            <a href="{{ route('admin.based.based') }}">
                                <i class="bx bx-box"></i>
                                <span>Based</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.stack.stack') }}">
                                <i class="bx bx-box"></i>
                                <span>Stack</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.type.type') }}">
                                <i class="bx bx-box"></i>
                                <span>Type</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.price.price') }}">
                                <i class="bx bx-box"></i>
                                <span>Price</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Blog</span>
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
                <li class="menu-title">Pustaka</li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.project.project') }}" class="waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Project</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Blog</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>