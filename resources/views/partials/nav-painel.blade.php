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


    <div id="right-sidebar" class="animated">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
            <div class="sidebar-container" style="overflow: hidden; width: auto; height: 100%;">
                <ul class="nav nav-tabs navs-3">
                    <li class="active"><a data-toggle="tab" href="#tab-10">
                        Pacientes
                    </a></li>
                    <li><a data-toggle="tab" href="#tab-20">
                        OBS
                    </a></li>
                    <li class=""><a data-toggle="tab" href="#tab-30">
                        Tarefas
                    </a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-20" class="tab-pane">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> Observações recentes</h3>
                            <small><i class="fa fa-tim"></i> Você tem 10 novas observações</small>
                        </div>

                        <div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="{{ asset('img/a1.jpg')}}">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        Vestibulum ante ipsum primis. Vestibulum ante ipsum primis. Vestibulum ante ipsum.
                                        <br>
                                        <small class="text-muted">Ipsum 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="{{ asset('img/a2.jpg')}}">
                                    </div>
                                    <div class="media-body">
                                        Vestibulum ante ipsum primis. Vestibulum ante ipsum primis. Vestibulum ante ipsum.
                                        <br>
                                        <small class="text-muted">Ipsum 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="{{ asset('img/a3.jpg')}}">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        Vestibulum ante ipsum primis. Vestibulum ante ipsum primis. Vestibulum ante ipsum.
                                        <br>
                                        <small class="text-muted">Ipsum 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="{{ asset('img/a4.jpg')}}">
                                    </div>
                                   <div class="media-body">
                                        Vestibulum ante ipsum primis. Vestibulum ante ipsum primis. Vestibulum ante ipsum.
                                        <br>
                                        <small class="text-muted">Ipsum 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="{{ asset('img/a8.jpg')}}">
                                    </div>
                                    <div class="media-body">
                                        Vestibulum ante ipsum primis. Vestibulum ante ipsum primis. Vestibulum ante ipsum.
                                        <br>
                                        <small class="text-muted">Ipsum 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="{{ asset('img/a7.jpg')}}">
                                    </div>
                                    <div class="media-body">
                                        Vestibulum ante ipsum primis. Vestibulum ante ipsum primis. Vestibulum ante ipsum.
                                        <br>
                                        <small class="text-muted">Ipsum 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="{{ asset('img/a3.jpg')}}">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                   <div class="media-body">
                                        Vestibulum ante ipsum primis. Vestibulum ante ipsum primis. Vestibulum ante ipsum.
                                        <br>
                                        <small class="text-muted">Ipsum 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="{{ asset('img/a4.jpg')}}">
                                    </div>
                                    <div class="media-body">
                                        Vestibulum ante ipsum primis. Vestibulum ante ipsum primis. Vestibulum ante ipsum.
                                        <br>
                                        <small class="text-muted">Ipsum 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div id="tab-30" class="tab-pane">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> Vestibulum ante ipsum</h3>
                            <small><i class="fa fa-tim"></i>  Vestibulum ante ipsum primis. Vestibulum ante ipsum primis.</small>
                        </div>

                        <ul class="sidebar-list">
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9hs atrás </div>
                                    <h4>Vestibulum ante ipsum.</h4>
                                     Vestibulum ante ipsum primis. Vestibulum ante ipsum primis.  
									 <div class="small">Completo: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Tarefa para: 4:00 pm - 12.06.2017</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9hs atrás</div>
                                    <h4>Vestibulum ante ipsum.</h4>
                                     Vestibulum ante ipsum primis. Vestibulum ante ipsum primis.
                                    <div class="small">Completo: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9hs atrás</div>
                                    <h4>Vestibulum ante ipsum.</h4>
                                     Vestibulum ante ipsum primis. Vestibulum ante ipsum primis.

                                    <div class="small">Completo: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NOVA</span>
                                    <h4>Vestibulum ante ipsum.</h4>
                                     Vestibulum ante ipsum primis. Vestibulum ante ipsum primis.
                                    <div class="small">Completo: 22%</div>
                                    <div class="small text-muted m-t-xs">Tarefa para: 4:00 pm - 12.06.2017</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9hs atrás</div>
                                    <h4>Vestibulum ante ipsum.</h4>
                                     Vestibulum ante ipsum primis. Vestibulum ante ipsum primis.

                                    <div class="small">Completo com: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Tarefa para: 4:00 pm - 12.06.2017</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9hs atrás</div>
                                    <h4>Vestibulum ante ipsum.</h4>
                                     Vestibulum ante ipsum primis. Vestibulum ante ipsum primis.

                                    <div class="small">Completo: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9hs atrás</div>
                                    <h4>Vestibulum ante ipsum.</h4>
                                     Vestibulum ante ipsum primis. Vestibulum ante ipsum primis.ut.

                                    <div class="small">Completo: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NOVA</span>
                                    <h4>Vestibulum ante ipsum.</h4>
                                     Vestibulum ante ipsum primis. Vestibulum ante ipsum primis.ut.
                                    <!--<div class="small pull-right m-t-xs">9 hs atrás</div>-->
                                    <div class="small">Completo: 22%</div>
                                    <div class="small text-muted m-t-xs">Tarefa para: 4:00 pm - 12.06.2017</div>
                                </a>
                            </li>
                        </ul>
                    </div>
 
						<div id="tab-10" class="tab-pane active">
							<div class="sidebar-title">
								<h3><i class="fa fa-users"></i> Pacientes</h3>
								<small><i class="fa fa-tim"></i> 14 pacientes - 4 não confirmados.</small>
							</div>

							<div class="setings-item">
						<span>
							 Paciente 1 / 8:00hs
						</span>
								<div class="switch">
									<div class="onoffswitch">
										<input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
										<label class="onoffswitch-label" for="example">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="setings-item">
						<span>
							Paciente 2 / 15:00hs
						</span>
								<div class="switch">
									<div class="onoffswitch">
										<input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example2">
										<label class="onoffswitch-label" for="example2">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="setings-item">
						<span>
							Paciente 3 / 16:00hs
						</span>
								<div class="switch">
									<div class="onoffswitch">
										<input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
										<label class="onoffswitch-label" for="example3">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="setings-item">
						<span>
							Paciente 4 / 17:00hs
						</span>
								<div class="switch">
									<div class="onoffswitch">
										<input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
										<label class="onoffswitch-label" for="example4">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="setings-item">
						<span>
							Paciente 5 / 18:00hs
						</span>
								<div class="switch">
									<div class="onoffswitch">
										<input type="checkbox" checked="" name="collapsemenu" class="onoffswitch-checkbox" id="example5">
										<label class="onoffswitch-label" for="example5">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="setings-item">
						<span>
							Paciente 6 / 19:00hs
						</span>
								<div class="switch">
									<div class="onoffswitch">
										<input type="checkbox" checked="" name="collapsemenu" class="onoffswitch-checkbox" id="example6">
										<label class="onoffswitch-label" for="example6">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="setings-item">
						<span>
							Paciente 7 / 20:00hs
						</span>
								<div class="switch">
									<div class="onoffswitch">
										<input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
										<label class="onoffswitch-label" for="example7">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
							</div>

							<div class="sidebar-content">
								<h4>Pacientes</h4>
								<div class="small">
									I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
									And typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
									Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
								</div>
							</div>
						</div>
					</div>
				</div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 30px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.4; z-index: 90; right: 1px;"></div></div>
			</div>