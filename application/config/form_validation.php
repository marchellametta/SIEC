<?php
$config = [
 'form-pendaftaran-peserta-jquery' => [
    [
      'field' => 'nama',
      'rules' => 'required|min_length[3]|max_length[50]',
      'errors' => [
        'required' => 'Nama lengkap harus diisi',
        'min_length' => 'Panjang nama minimal 3 karakter',
        'max_length' => 'Panjang nama maksimal 50 karakter'
      ]
    ],
    [
      'field' => 'alamat',
      'rules' => 'required|min_length[3]|max_length[50]',
      'errors'=> [
        'required' => 'Alamat harus diisi',
        'min_length' => 'Panjang alamat minimal 3 karakter',
        'max_length' => 'Panjang alamat maksimal 50 karakter'
      ]
    ],
    [
      'field' => 'pekerjaan',
      'rules' => 'required',
      'errors'=> [
        'required' => 'Pekerjaan harus diisi',
      ]
    ],
    [
      'field' => 'lembaga',
      'rules' => 'required',
      'errors'=> [
        'required' => 'Lembaga dibutuhkan',
      ]
    ],
    [
      'field' => 'pendidikan',
      'rules' => 'required',
      'errors' => [
        'required' => 'pendidikan harus diisi',
      ]
    ],
    [
      'field' => 'kota',
      'rules' => 'required',
      'errors'=> [
        'required' => 'Kota Asal harus diisi',
      ]
    ],
    [
      'field' => 'agama',
      'rules' => 'required',
      'errors'=> [
        'required' => 'Agama harus diisi',
      ]
    ],
    [
      'field' => 'nohp',
      'rules' => 'required|numeric',
      'errors'=> [
        'required' => 'Nomor HP harus diisi',
        'numeric'=> 'Nomor HP hanya boleh terdiri dari angka',
      ]
    ]
    // [
    //   'field' => 'topik[]',
    //   'rules' => 'required',
    //   'errors'=> [
    //     'required' => 'Harus ada kelas yang dipilih'
    //   ]
    // ]
    // [
    //   'field' => 'kelas[]',
    //   'rules' => 'required',
    //   'errors'=> [
    //     'required' => 'Harus ada kelas yang dipilih'
    //   ]
    // ]
  ],
  'form-pendaftaran-peserta' => [
     [
       'field' => 'nama',
       'rules' => 'required|min_length[3]|max_length[50]',
       'errors' => [
         'required' => 'Nama lengkap harus diisi',
         'min_length' => 'Panjang nama minimal 3 karakter',
         'max_length' => 'Panjang nama maksimal 50 karakter'
       ]
     ],
     [
       'field' => 'alamat',
       'rules' => 'required|min_length[3]|max_length[50]',
       'errors'=> [
         'required' => 'Alamat harus diisi',
         'min_length' => 'Panjang alamat minimal 3 karakter',
         'max_length' => 'Panjang alamat maksimal 50 karakter'
       ]
     ],
     [
       'field' => 'pekerjaan',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Pekerjaan harus diisi',
       ]
     ],
     [
       'field' => 'lembaga',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Lembaga dibutuhkan',
       ]
     ],
     [
       'field' => 'pendidikan',
       'rules' => 'required',
       'errors' => [
         'required' => 'pendidikan harus diisi',
       ]
     ],
     [
       'field' => 'kota',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Kota Asal harus diisi',
       ]
     ],
     [
       'field' => 'agama',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Agama harus diisi',
       ]
     ],
     [
       'field' => 'nohp',
       'rules' => 'required|numeric',
       'errors'=> [
         'required' => 'Nomor HP harus diisi',
         'numeric'=> 'Nomor HP hanya boleh terdiri dari angka',
       ]
     ],
     [
       'field' => 'topik[]',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Harus ada kelas yang dipilih'
       ]
     ]
   ],
  'form-pendaftaran-panitia' => [
     [
       'field' => 'nama',
       'rules' => 'required|min_length[3]|max_length[50]',
       'errors' => [
         'required' => 'Nama lengkap harus diisi',
         'min_length' => 'Panjang nama minimal 3 karakter',
         'max_length' => 'Panjang nama maksimal 50 karakter'
       ]
     ],
     [
       'field' => 'alamat',
       'rules' => 'required|min_length[3]|max_length[50]',
       'errors'=> [
         'required' => 'Alamat harus diisi',
         'min_length' => 'Panjang alamat minimal 3 karakter',
         'max_length' => 'Panjang alamat maksimal 50 karakter'
       ]
     ],
     [
       'field' => 'pekerjaan',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Pekerjaan harus diisi',
       ]
     ],
     [
       'field' => 'lembaga',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Lembaga dibutuhkan',
       ]
     ],
     [
       'field' => 'pendidikan',
       'rules' => 'required',
       'errors' => [
         'required' => 'pendidikan harus diisi',
       ]
     ],
     [
       'field' => 'kota',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Kota Asal harus diisi',
       ]
     ],
     [
       'field' => 'agama',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Agama harus diisi',
       ]
     ],
     [
       'field' => 'nohp',
       'rules' => 'required|numeric',
       'errors'=> [
         'required' => 'Nomor HP harus diisi',
         'numeric'=> 'Nomor HP hanya boleh terdiri dari angka',
       ]
     ],
     [
       'field' => 'kelas[]',
       'rules' => 'required',
       'errors'=> [
         'required' => 'Harus ada kelas yang dipilih'
       ]
     ]
   ],
   'form-ec' => [
      [
        'field' => 'jenis-ec',
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis EC harus diisi'
        ]
      ],
      [
        'field' => 'semester',
        'rules' => 'required',
        'errors'=> [
          'required' => 'Semester pelaksanaan harus diisi'
        ]
      ],
      [
        'field' => 'tahun',
        'rules' => 'required',
        'errors'=> [
          'required' => 'Tahun pelaksanaan harus diisi',
        ]
      ],
      [
        'field' => 'tema',
        'rules' => 'required',
        'errors'=> [
          'required' => 'Tema umum harus diisi',
        ]
      ],
      [
        'field' => 'deskripsi',
        'rules' => 'required',
        'errors' => [
          'required' => 'Deskripsi harus diisi',
        ]
      ],
      [
        'field' => 'biaya',
        'rules' => 'required',
        'errors'=> [
          'required' => 'Biaya harus diisi',
        ]
      ]
    ],
    'validasi-biaya-topik' => [
       [
         'field' => 'biaya-topik',
         'rules' => 'required',
         'errors' => [
           'required' => 'Biaya per topik harus diisi'
         ]
       ]
     ],
     'validasi-kapasitas-peserta' => [
        [
          'field' => 'kapasitas',
          'rules' => 'required',
          'errors' => [
            'required' => 'Kapasitas peserta harus diisi'
          ]
        ]
      ],
      'validasi-akun' => [
         [
           'field' => 'email',
           'rules' => 'required',
           'errors' => [
             'required' => 'Email harus diisi'
           ]
         ],
         [
           'field' => 'password',
           'rules' => 'required',
           'errors' => [
             'required' => 'Password harus diisi'
           ]
         ],
         [
           'field' => 'password_retype',
           'rules' => 'required|matches[password]',
           'errors' => [
             'required' => 'Ketik ulang password Anda',
             'matches' => 'Password tidak sama'
           ]
         ]
       ]

];
