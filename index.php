<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../"/>
		<title>Appointment</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="https://app.mesukdee.com/aof/theme/dist/assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="https://app.mesukdee.com/aof/theme/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="https://app.mesukdee.com/aof/theme/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
    <?php
        session_start();
        require_once('LineLogin.php');

        ?>
	<body id="kt_body" class="app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }
		</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-column-fluid">
				<!--begin::Body-->
				<div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#D5D9E2; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
					<!--begin::Email template-->
					<style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
					<div id="#kt_app_body_content" style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
						<div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
								<tbody>
									<tr>
										<td align="center" valign="center" style="padding-bottom: 10px">
											<!--begin:Email content-->
											<div style="text-align:center; margin:0 15px 34px 15px">
												<!--begin:Media-->
												<div style="margin-bottom: 15px">
													<!-- <img alt="Logo" src="https://app.mesukdee.com/aof/theme/dist/assets/media/email/icon-positive-vote-1.svg" /> -->
													<div class="symbol symbol-100px symbol-circle mb-7">
														<img src="aof/images/aof.png" alt="image" />
													</div>
												</div>
												<!--end:Media-->
												
												<!--begin:Action-->
                                                <?php 
                                                    if (!isset($_SESSION['profile'])) {
                                                        $line = new LineLogin();
                                                        $link = $line->getLink();
                                                ?>
                                                    <a href='<?php echo $link; ?>'><img src="aof/images/btn_login_base.png" alt="image" /></a>
                                                <?php } else { ?>
													<!--begin::Col-->
													<div class="col-lg-12 col-xl-12 col-xxl-6 mb-xl-0">
														<!--begin::Timeline widget 3-->
														<div class="card h-md-100">
															<!--begin::Header-->
															<div class="card-header border-0 pt-5">
																<h3 class="card-title align-items-start flex-column">
																	<span class="card-label fw-bold text-dark">รายการจอง</span>
																</h3>
															</div>
															<!--end::Header-->
															<!--begin::Card body-->
															<div class="card-body">
																<!--begin::Dates-->
																<?php 
																	include('connect.php');
																	$sql = "select * from appointments where description = '" . $_SESSION['profile']->email ."'" or die("Error:" . mysqli_error($conn));
																	$query = mysqli_query($conn, $sql);
																?>
																<?php while ($result = mysqli_fetch_assoc($query)) {?>
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-8">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-semibold ms-5 text-gray-600">
																		<!--begin::Time-->
																		<div class="text-gray-400">เวลา :
																		<div class="fs-5"><?= $result['start']; ?>
																		<span class="fs-7 text-gray-400 text-uppercase"></span></div></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<div class="text-gray-400">เวลา :
																		<a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"><?= $result['stime']; ?></a></div>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="text-gray-400">Payment :
																		<a href="#">ชำระเงินแล้ว</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<!-- <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a> -->
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<?php } ?>

																<!--end::Tab Content-->
															</div>
															<!--end::Card body-->
														</div>
														<!--end::Timeline widget 3-->
														<!--begin::Timeline widget 3-->
														<div class="card card-flush d-none h-md-100">
															
														</div>
														<!--end::Timeline widget-3-->
													</div>
													<!--end::Col-->
                                                    <a href='aof/welcome.php' style="background-color:#0d6efd; border-radius:6px;display:inline-block; text-align:center; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">จองคิว</a>
                                                    <a href='aof/logout.php' style="background-color:#dc3545; border-radius:6px;display:inline-block; text-align:center; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Logout</a>
                                                    <?php }?>
                                                <!--begin:Action-->
											</div>
											<!--end:Email content-->
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!--end::Email template-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "https://app.mesukdee.com/aof/theme/dist/assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="https://app.mesukdee.com/aof/theme/dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="https://app.mesukdee.com/aof/theme/dist/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>