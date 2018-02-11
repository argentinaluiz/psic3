<div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                <form role="search" class="navbar-form-custom" action="">
                    <div class="form-group">
                        <input type="text" placeholder="Buscar ..." class="form-control" name="top-search" id="top-search">
                    </div>
                </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><?php $dataHora = date("d/m/Y \à\s H:i"); echo $dataHora; ?></span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ asset('img/a7.jpg')}}">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h atrás</small>
                                    <strong>Vestibulum ante</strong> Vestibulum ante <strong>Vestibulum ante </strong>. <br>
                                    <small class="text-muted">3 dias atrás às 7:58 pm - 10.06.2017</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ asset('img/a4.jpg')}} ">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h atrás</small>
                                    <strong>Vestibulum ante ipsum primis</strong> Vestibulum ante ipsum <strong>Vestibulum ante </strong>. <br>
                                    <small class="text-muted">Ontem 1:21 pm - 11.06.2017</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ asset('img/profile.jpg')}}">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h atrás</small>
                                    <strong>Vestibulum ante </strong> primis <strong>ipsum primis</strong>. <br>
                                    <small class="text-muted">2 dias atrás às 2:30 am - 11.06.2017</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Leia todas as mensagens</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Você tem 16 mensagens
                                    <span class="pull-right text-muted small">4 minutos atrás</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 novas tarefas
                                    <span class="pull-right text-muted small">12 minutos atrás</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Vestibulum ante 
                                    <span class="pull-right text-muted small">4 minutos atrás</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="">
                                    <strong>Veja todas as notificações</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       <i class="fa fa-sign-out"></i> {{trans('auth.logout')}}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>