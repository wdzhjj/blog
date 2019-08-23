<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @section('sidebar-menu')
                @foreach($menu as $value)
                            <li class="treeview active">
                                <a>
                                    <i class="fa fa-circle-o"></i> <span>{{ $value['type_name'] }}</span>
                                    <span class="pull-right-container"></span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(is_array($value['son']))
                                    @foreach($value['son'] as $v)
                                    <li><a href="{{ $v['url'] }}" style="margin-left: 20px">{{ $v['type_name'] }}</a></li>
                                    @endforeach
                                        @endif
                                </ul>
                            </li>
                @endforeach
            @show

            {{--<li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>--}}
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>监控</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>攻击</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>流量</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-blue"></i> <span>版本</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
