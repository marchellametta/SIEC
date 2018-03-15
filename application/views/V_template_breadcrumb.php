<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
$breadcrumbRules = [
  'V_informasi_aktif' => [
    'crumbs' => [
      1 => [
        'text' => 'Informasi Kelas yang Sedang Berlangsung',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_informasi_akan' => [
    'crumbs' => [
      1 => [
        'text' => 'Informasi Kelas Mendatang',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_informasi_riwayat' => [
    'crumbs' => [
      1 => [
        'text' => 'Informasi Riwayat Kelas',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_pendaftaran' => [
    'crumbs' => [
      1 => [
        'text' => 'Pendaftaran',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_lokasi' => [
    'crumbs' => [
      1 => [
        'text' => 'Lokasi',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_visimisi' => [
    'crumbs' => [
      1 => [
        'text' => 'Visi & Misi',
        'link' => '#',
        'active'=>true
      ]
    ]
  ],
  'V_detail' => [
    'crumbs' => [
      1 => [
        'text' => 'Informasi',
        'link' => $base_url.'informasi',
      ],
      2 => [
        'text' => 'Detail',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_user_profile' => [
    'crumbs' => [
      1 => [
        'text' => 'Profil',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_kelas_user' => [
    'crumbs' => [
      1 => [
        'text' => 'Kelas Saya',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_list_evaluasi_kelas_user' => [
    'crumbs' => [
      1 => [
        'text' => 'Kelas Saya',
        'link' => $base_url.'kelas-saya',
      ],
      2 => [
        'text' => 'Daftar Topik Saya',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_daftar_kelas_aktif' => [
    'crumbs' => [
      1 => [
        'text' => 'Daftar Kelas yang Sedang Berlangsung',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_daftar_kelas_akan' => [
    'crumbs' => [
      1 => [
        'text' => 'Daftar Kelas Mendatang',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_daftar_kelas_riwayat' => [
    'crumbs' => [
      1 => [
        'text' => 'Daftar Riwayat Kelas',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_list_absensi_kelas' => [
    'crumbs' => [
      1 => [
        'text' => 'Daftar Kelas',
        'link' => $base_url.'kelas',
      ],
      2 => [
        'text' => 'Daftar Topik',
        'link' => '#',
        'active' => true
      ]
    ]
  ],
  'V_pembayaran' => [
    'crumbs' => [
      1 => [
        'text' => 'Daftar Kelas',
        'link' => $base_url.'kelas',
      ],
      2 => [
        'text' => 'Daftar Pembayaran',
        'link' => '#',
        'active' => true
      ]
    ]
  ]
];

if (isset($viewName) && isset($breadcrumbRules[$viewName])) {
  $selectedBreadcrumbRule = $breadcrumbRules[$viewName];
}
?>
<div id="topbar">
  <div class="topbar-left">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo $base_url ?>"><i class="fa fa-home mr-1"></i>Beranda</a></li>
        <?php if (isset($selectedBreadcrumbRule)): ?>
          <?php foreach ($selectedBreadcrumbRule['crumbs'] as $crumb): ?>
            <li class="breadcrumb-item <?php if (isset($crumb['active']) && $crumb['active'] == true) echo 'active' ?>" >
              <?php if (isset($crumb['link'])): ?>
                <a href="<?php echo $crumb['link'] ?>">
              <?php endif ?>
              <?php echo $crumb['text'] ?>
              <?php if (isset($crumb['link'])): ?>
                </a>
              <?php endif ?>
            </li>
          <?php endforeach ?>
        <?php endif ?>
      </ol>
    </nav>
  </div>
</div>
