          <ul class="nav navbar-nav">
              @foreach (get_menu('header') as $menu)
                  @if ($menu->sub)
                      <li class="sub-menu-down"><a href="javascript:void(0);">{{ $menu->name }} <i
                                  class="fa fa-angle-down"></i></a>
                          <ul class="sub-menu">
                              @foreach ($menu->sub as $menu2)
                                  @if ($menu2->sub)
                                      <li><a href="javascript:void();">{{ $menu2->name }} <i
                                                  class="fa fa-angle-right"></i></a>
                                          <ul class="sub-menu">
                                              @foreach ($menu2->sub as $menu3)
                                                  @if ($menu3->sub)
                                                      <li><a href="javascript:void();">{{ $menu3->name }} <i
                                                                  class="fa fa-angle-right"></i></a>
                                                          <ul class="sub-menu">
                                                              @foreach ($menu3->sub as $menu4)
                                                                  @if ($menu4->sub)
                                                                      <li><a href="javascript:void();">{{ $menu4->name }}
                                                                              <i class="fa fa-angle-right"></i></a>
                                                                          <ul class="sub-menu">
                                                                              @foreach ($menu4->sub as $menu5)
                                                                                  <li><a
                                                                                          href="contact.html">{{ $menu5->name }}</a>
                                                                                  </li>
                                                                              @endforeach
                                                                          </ul>
                                                                      @else
                                                                      <li><a href="contact.html">{{ $menu4->name }}</a>
                                                                      </li>
                                                                  @endif
                                                              @endforeach
                                                          </ul>
                                                      @else
                                                      <li><a href="contact.html">{{ $menu3->name }}</a></li>
                                                  @endif
                                              @endforeach
                                          </ul>
                                      </li>
                                  @else
                                      <li><a href="{{ $menu2->url }}">{{ $menu2->name }}</a></li>
                                  @endif
                              @endforeach
                          </ul>
                      </li>
                  @else
                      <li><a href="{{ $menu->url }}">{{ $menu->name }}</a></li>
                  @endif
              @endforeach
          </ul>
