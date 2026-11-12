<?php
$mobileModule = $_SESSION['web']['nama_module'] ?? '';
$isPosKasirScreen = $mobileModule === 'pos-kasir';
$isPenjualanMobileScreen = strpos($mobileModule, 'penjualan-mobile') === 0;
$isBarangMobileScreen = $mobileModule === 'barang-mobile';
$isMobileSalesScreen = $isPosKasirScreen || $isPenjualanMobileScreen || $isBarangMobileScreen;
$mobileSalesBodyClass = $isMobileSalesScreen ? 'mobile-sales-screen' . ($isPosKasirScreen ? ' pos-kasir-screen' : ($isPenjualanMobileScreen ? ' penjualan-mobile-screen' : ' barang-mobile-screen')) : '';
$posColorSchemes = ['blue-dark', 'blue', 'green', 'grey', 'purple', 'red', 'yellow'];
$posColorScheme = $app_layout['color_scheme'] ?? 'blue';
if (!in_array($posColorScheme, $posColorSchemes, true)) {
	$posColorScheme = 'blue';
}

$bootswatchTheme = $app_layout['bootswatch_theme'] ?? 'default';
if (!empty($_COOKIE['jwd_adm_theme']) && $_COOKIE['jwd_adm_theme'] !== 'light') {
	$bootswatchTheme = 'default';
}
$bootswatchTheme = basename((string) $bootswatchTheme);
if (!is_file(ROOTPATH . 'public/vendors/bootswatch/' . $bootswatchTheme . '/bootstrap.min.css')) {
	$bootswatchTheme = 'default';
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>

	<title>KASIR</title>
	<meta name="descrition" content="Kasir" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes" />
	<link rel="manifest" href="manifest.json" />
	<link rel="shortcut icon" href="<?= $config->baseURL . 'public/images/favicon.png?r=' . time() ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/vendors/fontawesome/css/all.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/vendors/bootstrap/css/bootstrap.min.css?r=' . time() ?>" />
	<?php if ($isMobileSalesScreen) { ?>
	<link rel="stylesheet" id="style-switch-bootswatch" type="text/css" href="<?= $config->baseURL . 'public/vendors/bootswatch/' . $bootswatchTheme . '/bootstrap.min.css?r=' . time() ?>" />
	<?php } ?>
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/vendors/bootstrap/css/bootstrap-custom.min.css?r=' . time() ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/vendors/sweetalert2/sweetalert2.min.css?r=' . time() ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/themes/modern/builtin/css/bootstrap-custom-pos-kasir.css?r=' . time() ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/vendors/overlayscrollbars/OverlayScrollbars.min.css?r=' . time() ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/vendors/pace/pace-theme-default.css?r=' . time() ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/themes/modern/builtin/css/layout-mobile.css?r=' . time() ?>" />
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/themes/modern/builtin/css/layout-mobile-panel.css?r=' . time() ?>" />

	<!-- Data Tables -->
	<link rel="stylesheet" type="text/css" href="<?= $config->baseURL . 'public/vendors/datatables/dist/css/dataTables.bootstrap5.min.css?r=' . time() ?>" />
	<!-- // Data Tables -->

	<link rel="stylesheet" id="style-switch" type="text/css" href="<?= $config->baseURL . 'public/themes/modern/builtin/css/color-schemes/' . $app_layout['color_scheme'] . '.css?r=' . time() ?>" />
	<link rel="stylesheet" id="style-switch-sidebar" type="text/css" href="<?= $config->baseURL . 'public/themes/modern/builtin/css/color-schemes/' . $app_layout['sidebar_color'] . '-sidebar.css?r=' . time() ?>" />
	<link rel="stylesheet" id="font-switch" type="text/css" href="<?= $config->baseURL . 'public/themes/modern/builtin/css/fonts/' . $app_layout['font_family'] . '.css?r=' . time() ?>" />
	<link rel="stylesheet" id="font-size-switch" type="text/css" href="<?= $config->baseURL . 'public/themes/modern/builtin/css/fonts/font-size-' . $app_layout['font_size'] . '.css?r=' . time() ?>" />
	<link rel="stylesheet" id="logo-background-color-switch" type="text/css" href="<?= $config->baseURL . 'public/themes/modern/builtin/css/color-schemes/' . $app_layout['logo_background_color'] . '-logo-background.css?r=' . time() ?>" />

	<?php
	if (@$styles) {
		foreach ($styles as $file) {
			if (is_array($file)) {

				$attr = '';
				if (key_exists('attr', $file)) {
					foreach ($file['attr'] as $attr_name => $attr_value) {
						$attr .= $attr_name . '="' . $attr_value . '"';
					}
				}

				echo '<link rel="stylesheet" data-type="dynamic-resource-head" ' . $attr . ' type="text/css" href="' . $file['file'] . '?r=' . time() . '"/>' . "\n";
			} else {
				echo '<link rel="stylesheet" data-type="dynamic-resource-head" type="text/css" href="' . $file . '?r=' . time() . '"/>' . "\n";
			}
		}
	}

	?>

	<script type="text/javascript">
		var base_url = "<?= $config->baseURL ?>";
		var module_url = "<?= $module_url ?>";
		var current_url = "<?= current_url() ?>";
		var theme_url = "<?= $config->baseURL . '/public/themes/modern/builtin/' ?>";
	</script>

	<script type="text/javascript" src="<?= $config->baseURL . 'public/vendors/jquery/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?= $config->baseURL . 'public/vendors/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
	<script type="text/javascript" src="<?= $config->baseURL . 'public/vendors/bootbox/bootbox.min.js' ?>"></script>
	<script type="text/javascript" src="<?= $config->baseURL . 'public/vendors/sweetalert2/sweetalert2.min.js' ?>"></script>
	<script type="text/javascript" src="<?= $config->baseURL . 'public/themes/modern/builtin/js/functions.js?r=' . time() ?>"></script>
	<script type="text/javascript" src="<?= $config->baseURL . 'public/vendors/overlayscrollbars/jquery.overlayScrollbars.min.js?r=' . time() ?>"></script>
	<script type="text/javascript" src="<?= $config->baseURL . 'public/vendors/pace/pace.min.js?r=' . time() ?>"></script>
	<script type="text/javascript" src="<?= $config->baseURL . 'public/themes/modern/js/main-mobile.js?r=' . time() ?>"></script>

	<!-- Data Tables -->
	<script type="text/javascript" src="<?= $config->baseURL . 'public/vendors/datatables/dist/js/jquery.dataTables.min.js?r=' . time() ?>"></script>
	<script type="text/javascript" src="<?= $config->baseURL . 'public/vendors/datatables/dist/js/dataTables.bootstrap5.min.js?r=' . time() ?>"></script>
	<!-- // Data Tables -->

	<!-- Dynamic scripts -->
	<?php
	if (@$scripts) {
		foreach ($scripts as $file) {
			if (is_array($file)) {

				$attr = '';
				if (key_exists('attr', $file)) {
					foreach ($file['attr'] as $attr_name => $attr_value) {
						$attr .= $attr_name . '="' . $attr_value . '"';
					}
				}

				if (@$file['print']) {
					echo '<script type="text/javascript" data-type="dynamic-resource-head" ' . $attr . '>' . $file['script'] . '</script>' . "\n";
				} else {
					echo '<script type="text/javascript" data-type="dynamic-resource-head" ' . $attr . ' src="' . $file['script'] . '?r=' . time() . '"></script>' . "\n";
				}
			} else {
				echo '<script type="text/javascript" data-type="dynamic-resource-head" src="' . $file . '?r=' . time() . '"></script>' . "\n";
			}
		}
	}
	?>

	<head>

	<body class="<?= $mobileSalesBodyClass ?>" <?= $isMobileSalesScreen ? 'data-pos-color-scheme="' . esc($posColorScheme) . '"' : '' ?>>
		<div class="page-container" id="page-container">
			<div id="page-content">
				<?php
				echo $this->renderSection('content');
				?>
			</div>
		</div> <!-- Page Container -->
		<?php
		// echo '<pre>'; print_r($user); die;
		$nama_module = $_SESSION['web']['nama_module'];
		$show_kasir_settings = $nama_module === 'pos-kasir';
		$active_kasir = strpos($nama_module, 'kasir') !== false ? 'active' : '';
		$active_penjualan = strpos($nama_module, 'penjualan-mobile') !== false ? 'active' : '';;
		$active_barang = strpos($nama_module, 'barang-mobile') !== false ? 'active' : '';
		?>
		<nav class="navbar navbar-dark navbar-footer navbar-expand fixed-bottom">
			<ul class="navbar-nav">
				<li class="nav-item bg-success">
					<a id="btn-menu-mobile" class="nav-link nav-menu-mobile px-4" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i class="fa fa-bars"></i></a>
				</li>
				<li class="nav-item">
					<button id="setting-barang" type="button" class="nav-link nav-kasir-settings setting-barang" aria-label="Pengaturan kasir" title="Pengaturan kasir" style="<?= $show_kasir_settings ? '' : 'display:none' ?>">
						<i class="fas fa-cog" aria-hidden="true"></i>
					</button>
				</li>
			</ul>
			<ul class="navbar-nav nav-justified w-100">
				<li class="nav-item bg-success">
					<a href="<?= base_url() ?>/pos-kasir" id="menu-kasir" class="nav-link <?= $active_kasir ?> link-spa"><i class="fas fa-cash-register"></i><span class="hide-mobile ms-2">Kasir</span></a>
				</li>
				<li class="nav-item bg-success">
					<a href="<?= base_url() ?>/penjualan-mobile" id="menu-invoice" class="nav-link <?= $active_penjualan ?> link-spa"><i class="fas fa-receipt"></i><span class="hide-mobile ms-2">Invoice</span></a>
				</li>
				<?php
				if (has_permission('update_all', 'barang-mobile')) {
				?>
					<li class="nav-item bg-success">
						<a href="<?= base_url() ?>/barang-mobile" class="nav-link <?= $active_barang ?> link-spa"><i class="fas fa-boxes"></i><span class="hide-mobile ms-2">Barang</span></a>
					</li>
				<?php
				} ?>
				<!-- Tambahkan menu untuk Kalkulator -->
				<li class="nav-item bg-info">
					<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#kalkulatorModal">
						<i class="fas fa-calculator"></i>
						<span class="hide-mobile ms-2">Kalkulator</span>
					</a>
				</li>

				<!-- Akhir tambahan menu Kalkulator -->
			</ul>
		</nav>

		<div class="sidebar-mobile offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" style="width:280px" aria-labelledby="offcanvasExampleLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title" id="offcanvasExampleLabel"> <img src="<?= base_url() . '/public/images/' . $setting_aplikasi['logo_login'] ?>" /></h5>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body sidebar-body">
				<div class="img-profile">
					<?php
					$file = $user['avatar'];

					if ($user['avatar']) {
						$path = ROOTPATH . '/public/images/user/' . $file;
						if (!file_exists($path)) {
							$file = 'default.png';
						}
					} else {
						$file = 'default.png';
					}
					?>
					<div class="avatar-profile">
						<img class="rounded-circle" src="<?= base_url() . '/public/images/user/' . $file ?>" />
					</div>
					<p class="mb-0 mt-3"><?= $user['nama'] ?></p>
					<p class="mb-0"><?= $user['email'] ?></p>
				</div>
				<nav class="mt-3">
					<ul class="nav nav-pills flex-column">
						<?php
						if (key_exists(46, $_SESSION['user']['all_permission'])) {
						?>
							<li class="nav-item">
								<a class="nav-link link-dark py-3 px-3 link-dashboard" href="<?= base_url() . '/dashboard' ?>">
									<i class="fas fa-tachometer-alt me-2"></i>Dashboard
								</a>
							</li>
						<?php
						}
						?>
						<li class="nav-item">
							<a class="nav-link link-dark py-3 px-3 link-spa" href="<?= base_url() . '/builtin/user/edit?mobile=true' ?>">
								<i class="fas fa-user me-2"></i>Profile
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link link-dark py-3 px-3 link-spa" href="<?= base_url() . '/builtin/user/edit-password?mobile=true' ?>">
								<i class="fas fa-lock me-2"></i>Ubah Password
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link link-dark py-3 px-3 link-spa" href="<?= base_url() . '/login/logout?mobile=true' ?>">
								<i class="fas fa-sign-out-alt me-2"></i>Logout
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</body>

	<!-- Modal Kalkulator -->
	<div class="modal fade" id="kalkulatorModal" tabindex="-1" aria-labelledby="kalkulatorModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="kalkulatorModalLabel">Kalkulator</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="modal-bodykalkulator">
						<!-- Isi modal kalkulator di sini -->
						<!-- Contoh: -->
						<input type="text" id="kalkulatorInput" readonly>
						<div class="row">
							<button class="btn btn-danger" onclick="clearAll()">AC</button>
							<button class="btn btn-warning" onclick="clearEntry()">CE</button>
							<button class="btn btn-success" onclick="calculatePercentage()">%</button>
							<button class="btn btn-success" onclick="appendToInput('/')">÷</button>
							<button class="btn btn-secondary" onclick="appendToInput('1')">1</button>
							<button class="btn btn-secondary" onclick="appendToInput('2')">2</button>
							<button class="btn btn-secondary" onclick="appendToInput('3')">3</button>
							<button class="btn btn-success" onclick="appendToInput('*')">x</button>
							<button class="btn btn-secondary" onclick="appendToInput('4')">4</button>
							<button class="btn btn-secondary" onclick="appendToInput('5')">5</button>
							<button class="btn btn-secondary" onclick="appendToInput('6')">6</button>
							<button class="btn btn-success" onclick="appendToInput('-')">-</button>
							<button class="btn btn-secondary" onclick="appendToInput('7')">7</button>
							<button class="btn btn-secondary" onclick="appendToInput('8')">8</button>
							<button class="btn btn-secondary" onclick="appendToInput('9')">9</button>
							<button class="btn btn-success" onclick="appendToInput('+')">+</button>
							<button class="btn btn-secondary" onclick="appendToInput('0')">0</button>
							<button class="btn btn-secondary" onclick="appendToInput('000')">000</button> <!-- Tombol "000" -->
							<button class="btn btn-secondary" onclick="appendToInput('.')">.</button> <!-- Tombol titik "." -->

							<!-- Tambahkan tombol angka lainnya sesuai kebutuhan -->

							<button class="btn btn-primary" onclick="calculate()">=</button>

							<!-- Tombol tambah, kurang, kali, bagi -->
						</div>
						<!-- Tambahkan tombol angka lainnya sesuai kebutuhan -->
					</div>
				</div>
				<!-- <div class="modal-footer">
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Selesai</button>
				</div> -->
			</div>
		</div>
	</div>

</html>