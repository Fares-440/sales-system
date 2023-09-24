<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow-x: hidden;">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="
                        {{ route('dashboard') }}
                        "
                            data-target="#dashboard">
                            <div class="pull-left">
                                <i class="fa-solid fa-house"></i>
                                <span class="right-nav-text">{{ trans('main_trans.dashboard') }}</span>
                            </div>

                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <!-- supplier-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#supplier-menu">
                            <div class="pull-left">
                                <i class="fa-solid fa-industry"></i>
                                <span class="right-nav-text">{{ trans('main_trans.suppliers') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="supplier-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a
                                    href="
                                {{ route('supplier') }}
                                ">{{ trans('main_trans.suppliers_list') }}</a>
                            </li>

                        </ul>
                    </li>
                    {{-- categories --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#categories-menu"
                            aria-expanded="
                            {{-- {{ Route::is('classrooms.index') ? 'true' : 'false' }} --}}
                            ">
                            <div class="pull-left">
                                <i class="fa-solid fa-list"></i>
                                <span class="right-nav-text">
                                    {{ trans('main_trans.categories_list') }}
                                </span>
                            </div>
                            <div class="pull-right">
                                <i class="ti-plus"></i>

                            </div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="categories-menu"
                            class="collapse
                        {{-- {{ Route::is('classrooms.index') ? 'show' : '' }} --}}
                        "
                            data-parent="#sidebarnav">
                            <li> <a
                                    href="
                            {{ route('category.type') }}
                            ">{{ trans('main_trans.categorie_types') }}</a>
                            </li>
                            <li> <a
                                    href="
                                {{ route('category') }}
                                ">{{ trans('main_trans.categories') }}</a>
                            </li>
                        </ul>
                    </li>

                    {{-- purchases --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#purchases-menu"
                            aria-expanded="
                            {{-- {{ Route::is('sections.index') ? 'true' : 'false' }} --}}
                            ">
                            <div class="pull-left">
                                <i class="fa-solid fa-bag-shopping"></i>
                                <span class="right-nav-text">{{ trans('main_trans.purchases_list') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="purchases-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('purchase') }}">{{ trans('main_trans.purchases') }}</a></li>
                            <li> <a
                                    href="{{ route('bill.create') }}">{{ trans('purchase_trans.purchase_create') }}</a>
                            </li>
                        </ul>
                    </li>
                    {{-- sales --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sales-menu"
                            aria-expanded="
                            {{-- {{ Route::is('sections.index') ? 'true' : 'false' }} --}}
                            ">
                            <div class="pull-left">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="right-nav-text">{{ trans('main_trans.sales_list') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sales-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sale') }}">{{ trans('main_trans.sales') }}</a></li>
                            {{-- <li> <a
                                    href="{{ route('bill.create') }}">{{ trans('purchase_trans.purchase_create') }}</a>
                            </li> --}}
                        </ul>
                    </li>

                    <!-- bills-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#bill-menu">
                            <div class="pull-left">
                                <i class="fas fa-file-invoice"></i>
                                <span class="right-nav-text">{{ trans('main_trans.bills_list') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="bill-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('bill') }}">{{ trans('main_trans.bills') }}</a></li>
                            <li> <a
                                    href="{{ route('purchase-bill') }}">{{ trans('main_trans.purchases_bills') }}</a>
                            </li>
                        </ul>
                    </li>


                    <!-- stores-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#store-menu">
                            <div class="pull-left">
                                <i class="fa-solid fa-store"></i>
                                <span class="right-nav-text">{{ trans('main_trans.stores_list') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="store-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('store') }}">{{ trans('main_trans.stores') }}</a></li>

                        </ul>
                    </li>



                    <li>
                        <a href="todo-list.html"><i class="ti-menu-alt"></i><span class="right-nav-text">Todo
                                list</span> </a>
                    </li>
                    <!-- menu item chat-->
                    <li>
                        <a href="{{route('posts.index')}}"><i class="ti-comments"></i><span class="right-nav-text">Chat
                            </span></a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
