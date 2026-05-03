<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "primary-container": "#2563eb",
            "surface-container-high": "#dee8ff",
            "on-tertiary-fixed": "#171c1f",
            "on-background": "#111c2d",
            "secondary": "#505f76",
            "on-tertiary-fixed-variant": "#43474b",
            "on-tertiary-container": "#edf1f5",
            "surface-container-low": "#f0f3ff",
            "background": "#f9f9ff",
            "inverse-on-surface": "#ecf1ff",
            "on-secondary-fixed-variant": "#38485d",
            "on-primary-container": "#eeefff",
            "on-error-container": "#93000a",
            "outline-variant": "#c3c6d7",
            "surface": "#f9f9ff",
            "error": "#ba1a1a",
            "secondary-fixed": "#d3e4fe",
            "on-primary-fixed-variant": "#003ea8",
            "secondary-container": "#d0e1fb",
            "primary-fixed": "#dbe1ff",
            "on-error": "#ffffff",
            "on-surface-variant": "#434655",
            "surface-bright": "#f9f9ff",
            "error-container": "#ffdad6",
            "primary": "#004ac6",
            "on-surface": "#111c2d",
            "on-primary": "#ffffff",
            "on-secondary-container": "#54647a",
            "tertiary": "#515659",
            "inverse-primary": "#b4c5ff",
            "surface-container-lowest": "#ffffff",
            "on-secondary": "#ffffff",
            "inverse-surface": "#263143",
            "outline": "#737686",
            "tertiary-container": "#696e71",
            "on-tertiary": "#ffffff",
            "tertiary-fixed-dim": "#c3c7cb",
            "surface-dim": "#cfdaf2",
            "surface-variant": "#d8e3fb",
            "secondary-fixed-dim": "#b7c8e1",
            "on-secondary-fixed": "#0b1c30",
            "on-primary-fixed": "#00174b",
            "tertiary-fixed": "#dfe3e7",
            "surface-tint": "#0053db",
            "surface-container-highest": "#d8e3fb",
            "surface-container": "#e7eeff",
            "primary-fixed-dim": "#b4c5ff"
          },
          "borderRadius": {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
          "spacing": {
            "container-max": "1280px",
            "gutter": "24px",
            "xs": "4px",
            "md": "16px",
            "sm": "8px",
            "xl": "32px",
            "2xl": "48px",
            "unit": "4px",
            "lg": "24px"
          },
          "fontFamily": {
            "h3": ["Manrope"],
            "label-sm": ["Inter"],
            "body-md": ["Inter"],
            "h2": ["Manrope"],
            "body-sm": ["Inter"],
            "h1": ["Manrope"],
            "body-lg": ["Inter"],
            "label-md": ["Inter"]
          },
          "fontSize": {
            "h3": ["20px", {"lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
            "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "500"}],
            "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
            "h2": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
            "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
            "h1": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
            "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
            "label-md": ["14px", {"lineHeight": "20px", "fontWeight": "600"}]
          }
        },
      },
    }
  </script>
<style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    body {
      background-color: #F8FAFC;
    }
  </style>
</head>
<body class="font-body-md text-on-surface">
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-screen w-64 border-r border-slate-200 bg-white z-50 flex flex-col gap-2 p-4">
<div class="mb-8 px-2 flex items-center gap-3">
<div class="h-10 w-10 bg-primary rounded-lg flex items-center justify-center text-white">
<span class="material-symbols-outlined" data-icon="domain" style="font-variation-settings: 'FILL' 1;">domain</span>
</div>
<div>
<h1 class="text-xl font-extrabold tracking-tight text-slate-900">SubdivisionPro</h1>
<p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Admin Terminal</p>
</div>
</div>
<nav class="flex flex-col gap-1 flex-grow">
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 hover:bg-slate-50 transition-all duration-200 rounded-lg font-medium group" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="font-manrope text-sm">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 hover:bg-slate-50 transition-all duration-200 rounded-lg font-medium group" href="#">
<span class="material-symbols-outlined" data-icon="home_work">home_work</span>
<span class="font-manrope text-sm">Houses</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 bg-blue-50 text-blue-600 rounded-lg font-semibold transition-all duration-200 group" href="#">
<span class="material-symbols-outlined" data-icon="group" style="font-variation-settings: 'FILL' 1;">group</span>
<span class="font-manrope text-sm">Residents</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 hover:bg-slate-50 transition-all duration-200 rounded-lg font-medium group" href="#">
<span class="material-symbols-outlined" data-icon="report">report</span>
<span class="font-manrope text-sm">Complaints</span>
</a>
</nav>
<div class="mt-auto border-t border-slate-100 pt-4">
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 hover:text-error hover:bg-error-container/20 transition-all duration-200 rounded-lg font-medium group" href="#">
<span class="material-symbols-outlined" data-icon="logout">logout</span>
<span class="font-manrope text-sm">Logout</span>
</a>
</div>
</aside>
<!-- TopNavBar -->
<header class="fixed top-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between h-16 px-8 ml-64 w-[calc(100%-16rem)] shadow-sm">
<div class="flex items-center gap-4 w-1/3">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg" data-icon="search">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 transition-all" placeholder="Search records..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4 text-slate-500">
<button class="hover:text-primary transition-colors cursor-pointer active:opacity-70"><span class="material-symbols-outlined" data-icon="notifications">notifications</span></button>
<button class="hover:text-primary transition-colors cursor-pointer active:opacity-70"><span class="material-symbols-outlined" data-icon="help_outline">help_outline</span></button>
<button class="hover:text-primary transition-colors cursor-pointer active:opacity-70"><span class="material-symbols-outlined" data-icon="settings">settings</span></button>
</div>
<div class="h-8 w-[1px] bg-slate-200"></div>
<div class="flex items-center gap-3">
<div class="text-right hidden lg:block">
<p class="text-xs font-bold text-slate-900">Admin User</p>
<p class="text-[10px] text-slate-500">Super Administrator</p>
</div>
<img alt="Administrator Profile" class="h-10 w-10 rounded-full border-2 border-white shadow-sm object-cover" data-alt="A professional headshot of a modern community manager in a bright, corporate office setting. The lighting is soft and natural, emphasizing a trustworthy and efficient persona. The background features a clean, minimalist administrative environment with subtle blue and white tones to match the corporate branding." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuxpazUkrKYTpiX70LPbyhkvYYFcZoh3XUQtIMt0OTPxaiXDTpLrRwB95_qfmQx97nu97O-GEqqF_CbRatkn10q6-2WS-fwKJSdD7EgsiGWR2ZxCIvsaAWVmRkrZU6XYJId8zhC-9LQza4OEyo--WdENFNvcTxbtzh0qSfkA2FY16hzVMvWnavIXXGbm4RcWPZpR9Fwl2aqH4FpCZ9OmYSRrwV6eBXYHpISNksinW6jMcUCUVFRr0jKgv2eAlkoMDYcl_MjEG9nfg"/>
</div>
</div>
</header>
<!-- Main Content -->
<main class="ml-64 pt-16 min-h-screen">
<div class="max-w-container-max mx-auto p-lg">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-xl">
<div>
<nav class="flex items-center gap-2 text-slate-400 mb-2">
<span class="font-label-sm text-[10px] uppercase tracking-wider">Dashboard</span>
<span class="material-symbols-outlined text-xs" data-icon="chevron_right">chevron_right</span>
<span class="font-label-sm text-[10px] uppercase tracking-wider text-primary">Residents</span>
</nav>
<h2 class="font-h1 text-h1 text-on-background">Residents Management</h2>
<p class="font-body-md text-secondary mt-1">Manage homeowner records, family members, and occupancy details.</p>
</div>
<button class="inline-flex items-center gap-2 bg-primary text-white px-lg py-md rounded-lg font-label-md hover:bg-primary-container transition-all shadow-md active:scale-[0.98]">
<span class="material-symbols-outlined" data-icon="person_add">person_add</span>
          Add Resident
        </button>
</div>
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-lg mb-xl">
<div class="bg-white p-md rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] flex items-center gap-md border border-slate-50">
<div class="h-12 w-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="group">group</span>
</div>
<div>
<p class="text-xs font-label-sm text-secondary uppercase tracking-tight">Total Residents</p>
<p class="text-h3 font-h3 text-on-background">1,248</p>
</div>
</div>
<div class="bg-white p-md rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] flex items-center gap-md border border-slate-50">
<div class="h-12 w-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="home">home</span>
</div>
<div>
<p class="text-xs font-label-sm text-secondary uppercase tracking-tight">Heads of Household</p>
<p class="text-h3 font-h3 text-on-background">412</p>
</div>
</div>
<div class="bg-white p-md rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] flex items-center gap-md border border-slate-50">
<div class="h-12 w-12 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="pending_actions">pending_actions</span>
</div>
<div>
<p class="text-xs font-label-sm text-secondary uppercase tracking-tight">Pending Approval</p>
<p class="text-h3 font-h3 text-on-background">14</p>
</div>
</div>
<div class="bg-white p-md rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] flex items-center gap-md border border-slate-50">
<div class="h-12 w-12 bg-slate-50 text-slate-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span>
</div>
<div>
<p class="text-xs font-label-sm text-secondary uppercase tracking-tight">New This Month</p>
<p class="text-h3 font-h3 text-on-background">28</p>
</div>
</div>
</div>
<!-- Main Data Table Container -->
<div class="bg-white rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] overflow-hidden border border-slate-100">
<!-- Table Actions -->
<div class="p-md flex items-center justify-between border-b border-slate-100 bg-slate-50/30">
<div class="flex items-center gap-md">
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm" data-icon="filter_list">filter_list</span>
<select class="pl-9 pr-8 py-2 bg-white border border-slate-200 rounded-lg text-sm font-medium text-slate-600 focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all appearance-none">
<option>All Roles</option>
<option>Head of Household</option>
<option>Member</option>
</select>
</div>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm" data-icon="location_on">location_on</span>
<select class="pl-9 pr-8 py-2 bg-white border border-slate-200 rounded-lg text-sm font-medium text-slate-600 focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all appearance-none">
<option>All Blocks</option>
<option>Block 01</option>
<option>Block 02</option>
<option>Block 03</option>
</select>
</div>
</div>
<div class="flex items-center gap-sm">
<button class="p-2 text-slate-400 hover:text-primary transition-colors"><span class="material-symbols-outlined" data-icon="download">download</span></button>
<button class="p-2 text-slate-400 hover:text-primary transition-colors"><span class="material-symbols-outlined" data-icon="print">print</span></button>
</div>
</div>
<!-- Table Content -->
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-slate-100 bg-slate-50/50">
<th class="px-lg py-md font-label-sm text-[11px] uppercase tracking-wider text-secondary">Name</th>
<th class="px-lg py-md font-label-sm text-[11px] uppercase tracking-wider text-secondary text-center">Age</th>
<th class="px-lg py-md font-label-sm text-[11px] uppercase tracking-wider text-secondary text-center">Gender</th>
<th class="px-lg py-md font-label-sm text-[11px] uppercase tracking-wider text-secondary">House (Block/Lot)</th>
<th class="px-lg py-md font-label-sm text-[11px] uppercase tracking-wider text-secondary">Role</th>
<th class="px-lg py-md font-label-sm text-[11px] uppercase tracking-wider text-secondary text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100">
<!-- Row 1 -->
<tr class="hover:bg-slate-50 transition-colors group">
<td class="px-lg py-md">
<div class="flex items-center gap-3">
<img alt="Resident Avatar" class="h-10 w-10 rounded-full object-cover" data-alt="A detailed, high-resolution portrait of a smiling middle-aged man with short dark hair, wearing a clean casual polo shirt. The background is a blurred suburban environment during sunset, casting a warm and welcoming glow. The aesthetic is professional yet friendly, fitting for a community management system." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8knzzm6amULJkRnYhus0BEmQe1PHZi5R8kVSfr71JB4Z_RW-2RUFVs2t67rEBoY1lQb2f9i5XDES4IYTY39SW9FBJtj712Ptdipcz9yWDw6qzNZyexKoxw-A47r0CLTeu-P4oPpqMApZ10yAJcSNwvV-gnXqn13VIRON9wi4AxwwsihuOQg3SKisBJv08zjA8alMPNk2I9b1ZI_Vzzym9u2A5XJyGM4AiTdNYZzJ0oC8FITXHAV8dGrPy6q3Zpdu4mqrOK5iahWY"/>
<div>
<p class="font-label-md text-on-surface">Alexander Mitchell</p>
<p class="text-xs text-secondary">alex.mitch@example.com</p>
</div>
</div>
</td>
<td class="px-lg py-md text-center text-sm font-medium text-slate-600">42</td>
<td class="px-lg py-md text-center">
<span class="inline-flex items-center px-2 py-1 rounded-full bg-blue-50 text-blue-700 text-[11px] font-bold">MALE</span>
</td>
<td class="px-lg py-md">
<p class="text-sm font-medium text-slate-700">Block 04, Lot 12</p>
<p class="text-[10px] text-slate-400">Emerald St.</p>
</td>
<td class="px-lg py-md">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-[11px] font-bold uppercase tracking-tight">
<span class="h-1.5 w-1.5 rounded-full bg-primary"></span>
                    Head
                  </span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-slate-50 transition-colors group">
<td class="px-lg py-md">
<div class="flex items-center gap-3">
<img alt="Resident Avatar" class="h-10 w-10 rounded-full object-cover" data-alt="A portrait of a young professional woman with a bright and friendly expression. She has long brown hair and is wearing a stylish blouse. The setting is a bright, high-key interior with modern architectural details. The lighting is soft and uniform, creating a clean corporate portrait style with a premium feel." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgpZ-owhihgYuD43mjYhaIQhQmrtlP9mHnK-dk9A6_5lyeDl5YQ0QxibrZ03Yo9haF3mTqpkexN9wtoCHG3OgHt-rspdi-uQtZfjvjJ92nmrPy1mEcsUKBxy7NPaymmFRZh8KvkdtgxW7pxP-8LrH_fNVDVGhD1LtoDdK7kZHUNvrwRe713dyW35foQ2Rh8zNSOycK7_B6Zd3A-u0ouiaUmK5oXgOelGIf-ogqZaghBvc-m9It3eSDSikRR5wvOPKHwh7XGVYNpJI"/>
<div>
<p class="font-label-md text-on-surface">Elena Rodriguez</p>
<p class="text-xs text-secondary">elena.rod@example.com</p>
</div>
</div>
</td>
<td class="px-lg py-md text-center text-sm font-medium text-slate-600">38</td>
<td class="px-lg py-md text-center">
<span class="inline-flex items-center px-2 py-1 rounded-full bg-pink-50 text-pink-700 text-[11px] font-bold">FEMALE</span>
</td>
<td class="px-lg py-md">
<p class="text-sm font-medium text-slate-700">Block 04, Lot 12</p>
<p class="text-[10px] text-slate-400">Emerald St.</p>
</td>
<td class="px-lg py-md">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-[11px] font-bold uppercase tracking-tight">
<span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                    Member
                  </span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-slate-50 transition-colors group">
<td class="px-lg py-md">
<div class="flex items-center gap-3">
<img alt="Resident Avatar" class="h-10 w-10 rounded-full object-cover" data-alt="A portrait of an elderly man with silver hair and glasses, wearing a classic button-down shirt. His expression is kind and grandfatherly. The background is a softly lit garden during the day, creating a peaceful and domestic atmosphere. The visual style is crisp and professional, using a natural color palette." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdNYtDgC_Fe9zJoC_PVeDlhqKPlhgbusp3F5U3IoBWN0uu7lF6al6ggNB-vNRz4kUbW_6-I4nMRjEn4EREdewr5RDnhXGUt1JvngOBs1901k5nm9HWysDrrhJzyRVZ96mzgWYDGcmBBwYicgg0HVpMZybY9AG_fAYUrFLkV238It2wINnKRQ3IrWHGbGbkvoClJo-cMDYEcos_xwwbk5m3dPA8c4c7o1DCx5gf9SpVI0gsKe8oRjc1LwUk5InaxiuNVSgoqo2VRBE"/>
<div>
<p class="font-label-md text-on-surface">Benjamin Thorne</p>
<p class="text-xs text-secondary">b.thorne@example.com</p>
</div>
</div>
</td>
<td class="px-lg py-md text-center text-sm font-medium text-slate-600">65</td>
<td class="px-lg py-md text-center">
<span class="inline-flex items-center px-2 py-1 rounded-full bg-blue-50 text-blue-700 text-[11px] font-bold">MALE</span>
</td>
<td class="px-lg py-md">
<p class="text-sm font-medium text-slate-700">Block 02, Lot 05</p>
<p class="text-[10px] text-slate-400">Ruby Drive</p>
</td>
<td class="px-lg py-md">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-[11px] font-bold uppercase tracking-tight">
<span class="h-1.5 w-1.5 rounded-full bg-primary"></span>
                    Head
                  </span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-slate-50 transition-colors group">
<td class="px-lg py-md">
<div class="flex items-center gap-3">
<img alt="Resident Avatar" class="h-10 w-10 rounded-full object-cover" data-alt="A studio portrait of a young man with a friendly, casual look. He is wearing a simple t-shirt and has short dark hair. The background is a solid light gray, emphasizing his features and the clean, high-end feel of the interface. The lighting is soft and directional, creating a gentle depth to the portrait." src="https://lh3.googleusercontent.com/aida-public/AB6AXuClq2axQR2tYNccmKRKcRrwHfoCG2HFdqqtupmWUX8o2nJ3UD4GXvaEWiozbrD9lYJmjeX0yiPv4O9buUHX88tpR3GUohO5Pt4zv1Dt7I5K6F_4F4zzWmeJy6uWPKp-4SKh2cJK2AqX-nOr_ubnct2XHihAu3z81EXf-Z3cjSYGyPEY9ZqxWA23_VtrkDwax1onqMog7zD0O3TmRch5Rwdn5s5hqreVenP_91f9s_9Jffp25H0f9larBT9ymm4aXaYju-JsYsVne1I"/>
<div>
<p class="font-label-md text-on-surface">Marcus Holloway</p>
<p class="text-xs text-secondary">marcus.h@example.com</p>
</div>
</div>
</td>
<td class="px-lg py-md text-center text-sm font-medium text-slate-600">24</td>
<td class="px-lg py-md text-center">
<span class="inline-flex items-center px-2 py-1 rounded-full bg-blue-50 text-blue-700 text-[11px] font-bold">MALE</span>
</td>
<td class="px-lg py-md">
<p class="text-sm font-medium text-slate-700">Block 07, Lot 21</p>
<p class="text-[10px] text-slate-400">Sapphire Ave.</p>
</td>
<td class="px-lg py-md">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-[11px] font-bold uppercase tracking-tight">
<span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                    Member
                  </span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-slate-50 transition-colors group">
<td class="px-lg py-md">
<div class="flex items-center gap-3">
<img alt="Resident Avatar" class="h-10 w-10 rounded-full object-cover" data-alt="A high-quality portrait of a professional woman with glasses and a friendly, intelligent expression. She is wearing a smart blazer, and the setting is a modern library or bright study space. The background is softly out of focus, highlighting the subject's professional yet approachable demeanor in a corporate minimalist style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9609r4jnYmgREN1afLKf-zOX_vu2gWo4sop0ok7xmdzgJArbecBBUNhH34IOD1GNwG9S_pyWJ2sshP-3lMjvlFnRCN18PgxhiNnqNI4j2cUJeuAqR9E7Qzqtk9yXt5fTwzAfgJ8N-kxyKLRdPS5jv7_ZtM-sfWC80NbcimnCFunwsWuk4Oo-go_yIrmtLj1pcL7t5Nyja9qZ1iQW7tYTTLa1eSvM5E1fGxNjfXZ5bawVXtQH0gH8FFzYEXViM2yoKfcBOzUJDS3w"/>
<div>
<p class="font-label-md text-on-surface">Sarah Jenkins</p>
<p class="text-xs text-secondary">s.jenkins@example.com</p>
</div>
</div>
</td>
<td class="px-lg py-md text-center text-sm font-medium text-slate-600">32</td>
<td class="px-lg py-md text-center">
<span class="inline-flex items-center px-2 py-1 rounded-full bg-pink-50 text-pink-700 text-[11px] font-bold">FEMALE</span>
</td>
<td class="px-lg py-md">
<p class="text-sm font-medium text-slate-700">Block 01, Lot 03</p>
<p class="text-[10px] text-slate-400">Diamond Road</p>
</td>
<td class="px-lg py-md">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-[11px] font-bold uppercase tracking-tight">
<span class="h-1.5 w-1.5 rounded-full bg-primary"></span>
                    Head
                  </span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-1">
<button class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all active:scale-90">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-md flex items-center justify-between border-t border-slate-100 bg-white">
<p class="text-sm text-secondary">Showing <span class="font-bold text-on-surface">1</span> to <span class="font-bold text-on-surface">5</span> of <span class="font-bold text-on-surface">412</span> households</p>
<div class="flex items-center gap-2">
<button class="p-2 text-slate-400 hover:text-primary transition-colors disabled:opacity-30" disabled="">
<span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
</button>
<div class="flex items-center gap-1">
<button class="h-8 w-8 rounded-lg bg-primary text-white font-bold text-xs">1</button>
<button class="h-8 w-8 rounded-lg text-slate-600 hover:bg-slate-100 font-bold text-xs">2</button>
<button class="h-8 w-8 rounded-lg text-slate-600 hover:bg-slate-100 font-bold text-xs">3</button>
<span class="text-slate-400 px-1">...</span>
<button class="h-8 w-8 rounded-lg text-slate-600 hover:bg-slate-100 font-bold text-xs">82</button>
</div>
<button class="p-2 text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div> 
</div>
</div>
</main>
</body></html>