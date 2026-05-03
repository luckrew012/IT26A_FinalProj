<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Houses Management - SubdivisionPro</title>
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
            background-color: #f9f9ff;
        }
    </style>
</head>
<body class="font-body-md text-on-surface">
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-screen w-64 border-r border-slate-200 bg-white dark:bg-slate-900 flex flex-col gap-2 p-4 z-50">
<div class="mb-8 px-2 flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center text-white">
<span class="material-symbols-outlined" data-icon="home_work">home_work</span>
</div>
<div>
<h1 class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-white">SubdivisionPro</h1>
<p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Admin Terminal</p>
</div>
</div>
<nav class="flex-1 flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-all duration-200 rounded-lg font-manrope text-sm font-medium" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                Dashboard
            </a>
<a class="flex items-center gap-3 px-3 py-2 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg font-semibold font-manrope text-sm" href="#">
<span class="material-symbols-outlined" data-icon="home_work">home_work</span>
                Houses
            </a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-all duration-200 rounded-lg font-manrope text-sm font-medium" href="#">
<span class="material-symbols-outlined" data-icon="group">group</span>
                Residents
            </a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-all duration-200 rounded-lg font-manrope text-sm font-medium" href="#">
<span class="material-symbols-outlined" data-icon="report">report</span>
                Complaints
            </a>
</nav>
<div class="mt-auto border-t border-slate-100 dark:border-slate-800 pt-4">
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:text-red-600 transition-all duration-200 font-manrope text-sm font-medium" href="#">
<span class="material-symbols-outlined" data-icon="logout">logout</span>
                Logout
            </a>
</div>
</aside>
<!-- TopNavBar -->
<header class="fixed top-0 right-0 z-40 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 flex items-center justify-between h-16 px-8 ml-64 w-[calc(100%-16rem)] shadow-sm dark:shadow-none">
<div class="flex items-center gap-4 w-1/3">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg" data-icon="search">search</span>
<input class="w-full bg-slate-100/50 border-none rounded-full py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/20 placeholder:text-slate-400 transition-all" placeholder="Quick find property..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4 text-slate-500">
<button class="hover:text-blue-600 transition-colors cursor-pointer active:opacity-70">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="hover:text-blue-600 transition-colors cursor-pointer active:opacity-70">
<span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
</button>
<button class="hover:text-blue-600 transition-colors cursor-pointer active:opacity-70">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
</div>
<div class="flex items-center gap-3 border-l pl-6 border-slate-200">
<div class="text-right">
<p class="text-sm font-bold text-slate-900">Admin User</p>
<p class="text-[10px] text-slate-500 uppercase font-semibold">Super Admin</p>
</div>
<img alt="Administrator Profile" class="w-10 h-10 rounded-full border-2 border-white shadow-sm" data-alt="A professional headshot of a community administrator in a modern office environment. The person is wearing a business casual outfit and smiling confidently at the camera. The background is softly blurred, showing a contemporary workspace with clean lines, neutral colors, and high-key lighting that emphasizes a bright, professional corporate aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxdwakhcvcAWZWLtMc2Sc-II1F_Wp0zyOSUkQA5uJtGqyEeq5HAqSpHGxpcABpOdH468hPh81AcmGwyEqBfpul853OTTILEf7YENk4PmReGsBhHjF4cpZbOTYIPheuXpLOUrat6Y0riFNPOnrlbNP97E9WZcWnSGunug4PE8Qs9JTK3UPbJDKUSKOrRN8daneO1_Ibz2YGaMvlz1weX_TWmor4M48f7elhVsScTbb1aImsapH4iO-RlQQ_I8cJaBMmc1pjNsr8G_w"/>
</div>
</div>
</header>
<!-- Main Content -->
<main class="ml-64 pt-16 min-h-screen">
<div class="max-w-[1280px] mx-auto p-gutter">
<!-- Page Header Section -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-lg mb-xl">
<div>
<h2 class="font-h1 text-h1 text-on-surface mb-xs">Houses Management</h2>
<p class="font-body-md text-secondary">Monitor property statuses and homeowner records across all blocks.</p>
</div>
<button class="bg-primary-container text-on-primary hover:bg-primary transition-all px-lg py-sm rounded-lg flex items-center gap-2 font-label-md shadow-lg shadow-primary-container/20">
<span class="material-symbols-outlined" data-icon="add_home">add_home</span>
                    Add House
                </button>
</div>
<!-- Bento Stats / Summary (High-end UI Pattern) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-lg mb-xl">
<div class="bg-white p-md rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] border border-slate-100">
<p class="font-label-sm text-secondary uppercase mb-sm">Total Units</p>
<div class="flex items-end justify-between">
<span class="font-h2 text-h1 text-on-surface">428</span>
<span class="text-primary-container bg-surface-container-low px-sm py-xs rounded text-[12px] font-bold">+12 this month</span>
</div>
</div>
<div class="bg-white p-md rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] border border-slate-100">
<p class="font-label-sm text-secondary uppercase mb-sm">Occupied</p>
<div class="flex items-end justify-between">
<span class="font-h2 text-h1 text-green-600">382</span>
<div class="w-16 h-2 bg-slate-100 rounded-full overflow-hidden">
<div class="bg-green-500 h-full w-[89%]"></div>
</div>
</div>
</div>
<div class="bg-white p-md rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] border border-slate-100">
<p class="font-label-sm text-secondary uppercase mb-sm">Vacant</p>
<div class="flex items-end justify-between">
<span class="font-h2 text-h1 text-orange-500">46</span>
<span class="font-label-sm text-secondary">11% Total</span>
</div>
</div>
<div class="bg-white p-md rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] border border-slate-100">
<p class="font-label-sm text-secondary uppercase mb-sm">Maintenance</p>
<div class="flex items-end justify-between">
<span class="font-h2 text-h1 text-blue-500">08</span>
<span class="material-symbols-outlined text-blue-300" data-icon="build">build</span>
</div>
</div>
</div>
<!-- Management Table Card -->
<div class="bg-white rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05),0px_4px_6px_rgba(0,0,0,0.02)] overflow-hidden border border-slate-100">
<!-- Filter Bar -->
<div class="p-md border-b border-slate-100 flex flex-col md:flex-row gap-md items-center justify-between bg-slate-50/50">
<div class="flex items-center gap-sm w-full md:w-auto">
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" data-icon="filter_list">filter_list</span>
<select class="bg-white border-outline-variant text-body-sm rounded-lg pl-10 pr-lg py-2 focus:ring-primary-container focus:border-primary-container transition-all">
<option>All Blocks</option>
<option>Block 01</option>
<option>Block 02</option>
<option>Block 03</option>
</select>
</div>
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" data-icon="category">category</span>
<select class="bg-white border-outline-variant text-body-sm rounded-lg pl-10 pr-lg py-2 focus:ring-primary-container focus:border-primary-container transition-all">
<option>All Status</option>
<option>Occupied</option>
<option>Vacant</option>
</select>
</div>
</div>
<div class="relative w-full md:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" data-icon="search">search</span>
<input class="w-full border-outline-variant rounded-lg pl-10 pr-md py-2 focus:ring-primary-container focus:border-primary-container text-body-sm" placeholder="Search by block or lot number..." type="text"/>
</div>
</div>
<!-- Table Content -->
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50/50">
<th class="px-lg py-md font-label-sm text-secondary uppercase tracking-wider">Property ID</th>
<th class="px-lg py-md font-label-sm text-secondary uppercase tracking-wider">Block</th>
<th class="px-lg py-md font-label-sm text-secondary uppercase tracking-wider">Lot</th>
<th class="px-lg py-md font-label-sm text-secondary uppercase tracking-wider">Owner / Resident</th>
<th class="px-lg py-md font-label-sm text-secondary uppercase tracking-wider">Status</th>
<th class="px-lg py-md font-label-sm text-secondary uppercase tracking-wider text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100">
<!-- Row 1 -->
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-lg py-md font-label-md text-primary-container">#PH-00124</td>
<td class="px-lg py-md font-body-md text-on-surface">Block 01</td>
<td class="px-lg py-md font-body-md text-on-surface">Lot 15</td>
<td class="px-lg py-md">
<div class="flex items-center gap-sm">
<div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-primary font-bold text-xs">JD</div>
<span class="font-label-md">Johnathan Doe</span>
</div>
</td>
<td class="px-lg py-md">
<span class="px-sm py-1 bg-green-100 text-green-700 text-[11px] font-bold rounded-full uppercase tracking-tighter">Occupied</span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-primary-container hover:bg-primary-fixed rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error-container rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-lg py-md font-label-md text-primary-container">#PH-00125</td>
<td class="px-lg py-md font-body-md text-on-surface">Block 01</td>
<td class="px-lg py-md font-body-md text-on-surface">Lot 16</td>
<td class="px-lg py-md">
<span class="text-slate-400 italic text-body-sm">Unassigned</span>
</td>
<td class="px-lg py-md">
<span class="px-sm py-1 bg-slate-100 text-slate-600 text-[11px] font-bold rounded-full uppercase tracking-tighter">Vacant</span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-primary-container hover:bg-primary-fixed rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error-container rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-lg py-md font-label-md text-primary-container">#PH-00126</td>
<td class="px-lg py-md font-body-md text-on-surface">Block 02</td>
<td class="px-lg py-md font-body-md text-on-surface">Lot 04</td>
<td class="px-lg py-md">
<div class="flex items-center gap-sm">
<div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-primary font-bold text-xs">AS</div>
<span class="font-label-md">Alice Smith</span>
</div>
</td>
<td class="px-lg py-md">
<span class="px-sm py-1 bg-green-100 text-green-700 text-[11px] font-bold rounded-full uppercase tracking-tighter">Occupied</span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-primary-container hover:bg-primary-fixed rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error-container rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-lg py-md font-label-md text-primary-container">#PH-00127</td>
<td class="px-lg py-md font-body-md text-on-surface">Block 02</td>
<td class="px-lg py-md font-body-md text-on-surface">Lot 05</td>
<td class="px-lg py-md">
<div class="flex items-center gap-sm">
<div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-primary font-bold text-xs">BW</div>
<span class="font-label-md">Bob Williams</span>
</div>
</td>
<td class="px-lg py-md">
<span class="px-sm py-1 bg-green-100 text-green-700 text-[11px] font-bold rounded-full uppercase tracking-tighter">Occupied</span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-primary-container hover:bg-primary-fixed rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error-container rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-slate-50/50 transition-colors group">
<td class="px-lg py-md font-label-md text-primary-container">#PH-00128</td>
<td class="px-lg py-md font-body-md text-on-surface">Block 03</td>
<td class="px-lg py-md font-body-md text-on-surface">Lot 01</td>
<td class="px-lg py-md">
<span class="text-slate-400 italic text-body-sm">Unassigned</span>
</td>
<td class="px-lg py-md">
<span class="px-sm py-1 bg-slate-100 text-slate-600 text-[11px] font-bold rounded-full uppercase tracking-tighter">Vacant</span>
</td>
<td class="px-lg py-md text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-primary-container hover:bg-primary-fixed rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error-container rounded-lg transition-all">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-md bg-white border-t border-slate-100 flex items-center justify-between">
<p class="text-body-sm text-secondary">Showing <span class="font-bold text-on-surface">1 - 5</span> of <span class="font-bold text-on-surface">428</span> units</p>
<div class="flex items-center gap-xs">
<button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-400 hover:bg-slate-50 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary-container text-white font-bold text-xs">1</button>
<button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-xs">2</button>
<button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-xs">3</button>
<span class="mx-xs text-slate-400">...</span>
<button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-xs">86</button>
<button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-400 hover:bg-slate-50 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Visual Asset Section (Asymmetric Layout Example) -->
<div class="mt-xl grid grid-cols-1 md:grid-cols-12 gap-lg items-center">
<div class="md:col-span-4 p-xl bg-primary-container text-white rounded-2xl shadow-xl shadow-primary-container/10">
<h3 class="font-h3 text-h3 mb-md">Quick Summary Map</h3>
<p class="font-body-sm opacity-90 mb-lg">Visual overview of subdivision density and utility access. Use the tools below to filter by zone.</p>
<div class="flex flex-col gap-sm">
<div class="flex items-center justify-between text-sm py-2 border-b border-white/10">
<span>Primary Zone</span>
<span class="font-bold">92% Filled</span>
</div>
<div class="flex items-center justify-between text-sm py-2 border-b border-white/10">
<span>Expansion Area</span>
<span class="font-bold">14% Filled</span>
</div>
<div class="flex items-center justify-between text-sm py-2">
<span>Commercial Strip</span>
<span class="font-bold">60% Filled</span>
</div>
</div>
</div>
<div class="md:col-span-8 h-64 rounded-2xl overflow-hidden relative border border-slate-200">
<img alt="Subdivision Map Layout" class="w-full h-full object-cover" data-alt="A high-angle, clean architectural rendering of a modern residential subdivision layout. The scene is presented as a clean, minimalist 3D map with simplified geometric houses and lush green common areas. The lighting is bright and airy, reflecting a professional urban planning aesthetic. The color palette is dominated by soft whites, cool greys, and vibrant green accents, perfectly aligning with a corporate administrative software interface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCOgTapWk8zPzc215WGvUHBGlzqLzkPRweKwnidWgRxrafdV9y_d7M5df0LspIO5M43eHUDJNVCAn0IuekX617dzMBchQX3hQ6z02xYqWdlIGwXTb4avZKQGtY70GCgHwvOCOM28aBXmOUCe69k0kee6AQ51U9CgoxNhBHRbAIS2FheXShsmaj6ujsod3Sy9hW4Shr5CE3AxjUA88zbPeRTnLf_MszEKxgUcT_yIeNiw2b_jQlActZqVvVegCAJN9q7mDAtNNuFW5E"/>
<div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent"></div>
<button class="absolute bottom-4 right-4 bg-white/90 backdrop-blur text-on-surface px-md py-2 rounded-full font-label-sm shadow-lg flex items-center gap-2 hover:bg-white transition-all">
<span class="material-symbols-outlined text-sm" data-icon="map">map</span>
                        Open Full Interactive Map
                    </button>
</div>
</div>
</div>
</main>
</body></html>
