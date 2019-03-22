<style>
    #sidebar-menu ul ul li.active a {
        /*color: #f3f3f3;*/
        /*background: #3A5F8C;*/
    }
</style>
<div class="sidebar-inner leftscroll">
    <div id="sidebar-menu">
        <ul>
            <li class="submenu">
                <a class="{{ isActive('/') }}" href="{{ url('/') }}">
                    <i class="fa fa-fw fa-bars"></i>
                    <span> Dashboard </span>
                </a>
            </li>

          <li class="submenu">
                <a class="{{ isActive('vue-basic*') }}" href="#">
                    <i class="fa fa-fw fa-table"></i>
                    <span> Basic VueJs </span> <span class="menu-arrow"></span>
                </a>
                <ul class="list-unstyled">
                    <li class="{{ isActive('vue-basic/hello-world') }}">
                        <a href="{{url('vue-basic/hello-world')}}">Hello World</a>
                    </li>
                    <li class="{{ isActive('vue-basic/data-binding') }}">
                        <a href="{{url('vue-basic/data-binding')}}">Data  Binding</a>
                    </li>
                    <li class="{{ isActive('vue-basic/attr-class-binding') }}">
                        <a href="{{url('vue-basic/attr-class-binding')}}">Attribute & Class Binding</a>
                    </li>
                    <li class="{{ isActive('vue-basic/list-rendering') }}">
                        <a href="{{url('vue-basic/list-rendering')}}">List Rendering</a>
                    </li>
                    <li class="{{ isActive('vue-basic/event-method') }}">
                        <a href="{{url('vue-basic/event-method')}}">Event & Method</a>
                    </li>
                    <li class="{{ isActive('vue-basic/computed-properties') }}">
                        <a href="{{url('vue-basic/computed-properties')}}">Computed Properties</a>
                    </li>
                    <li class="{{ isActive('vue-basic/filter') }}">
                        <a href="{{url('vue-basic/filter')}}">Filter </a>
                    </li>
                    <li class="{{ isActive('vue-basic/component') }}">
                        <a href="{{url('vue-basic/component')}}">Component </a>
                    </li>
                    <li class="{{ isActive('vue-basic/dynamic-component') }}">
                        <a href="{{url('vue-basic/dynamic-component')}}">Dynamic Component </a>
                    </li>
                    <li class="{{ isActive('vue-basic/animation') }}">
                        <a href="{{url('vue-basic/animation')}}">Animation</a>
                    </li>
                    <li class="{{ isActive('vue-basic/vue-router') }}">
                        <a href="{{url('vue-basic/vue-router')}}">Vue Router</a>
                    </li>
                    <li class="{{ isActive('vue-basic/watcher') }}">
                        <a href="{{url('vue-basic/watcher')}}">Watcher</a>
                    </li>
                    <li class="{{ isActive('vue-basic/stater-page') }}">
                        <a href="{{url('vue-basic/stater-page')}}">Stater Page</a>
                    </li>


                </ul>
            </li>
			<li class="submenu">
                <a class="{{ isActive('table*') }}" href="#">
                    <i class="fa fa-fw fa-table"></i>
                    <span> Tables </span> <span class="menu-arrow"></span>
                </a>
                <ul class="list-unstyled">
                    <li class="{{ isActive('table/basic') }}">
                        <a href="{{ url('table/basic') }}">Basic Tables</a>
                    </li>
                    <li class="{{ isActive('table/data-table') }}">
                        <a href="{{ url('table/data-table') }}">Data Tables</a>
                    </li>
                </ul>
            </li>

            <li class="submenu">
                <a class="{{ isActive('form*') }}" href="#">
                    <i class="fa fa-fw fa-file-text-o"></i> <span> Forms </span> <span class="menu-arrow"></span>
                </a>

                <ul class="list-unstyled">
                    <li class="{{ isActive('form/general') }}">
                        <a href="{{ url('form/general') }}">General Elements</a>
                    </li>
                    <li class="{{ isActive('form/select2') }}">
                        <a href="{{ url('form/select2') }}">Select2</a>
                    </li>

                </ul>
            </li>

            <li class="submenu">
                <a class="{{ isActive('advance-vue*') }}" href="#">
                    <i class="fa fa-fw fa-copy"></i> <span> Advance VueJs</span> <span class="menu-arrow"></span>
                </a>

                <ul class="list-unstyled">
                    <li class="{{ isActive('advance-vue/e-commerce') }}">
                        <a href="{{url('advance-vue/e-commerce')}}">E-Commerce</a>
                    </li>
                    <li class="{{ isActive('example/blank_page') }}">
                        <a href="{{url('example/blank_page')}}">Blank Page</a>
                    </li>

                </ul>
            </li>



           
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>

</div>