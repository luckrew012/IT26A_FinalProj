<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>SubdivisionPro Admin Terminal</title>
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
        body { background-color: #f9f9ff; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .shadow-ambient {
            box-shadow: 0px 1px 3px rgba(0,0,0,0.05), 0px 4px 6px rgba(0,0,0,0.02);
        }
        .shadow-overlay {
            box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="font-body-md text-on-surface">
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-screen w-64 border-r border-slate-200 bg-white flex flex-col gap-2 p-4 z-50">
<div class="flex items-center gap-3 px-2 mb-8">
<div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center text-white">
<span class="material-symbols-outlined" data-icon="home_work">home_work</span>
</div>
<div>
<h1 class="text-xl font-extrabold tracking-tight text-slate-900 font-h3">SubdivisionPro</h1>
<p class="text-[10px] uppercase tracking-widest font-bold text-slate-400">Admin Terminal</p>
</div>
</div>
<nav class="flex-1 flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2.5 bg-blue-50 text-blue-600 rounded-lg font-semibold transition-all duration-200 transform active:scale-[0.98]" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="font-manrope text-sm">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition-all duration-200 transform active:scale-[0.98]" href="#">
<span class="material-symbols-outlined" data-icon="home_work">home_work</span>
<span class="font-manrope text-sm">Houses</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition-all duration-200 transform active:scale-[0.98]" href="#">
<span class="material-symbols-outlined" data-icon="group">group</span>
<span class="font-manrope text-sm">Residents</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition-all duration-200 transform active:scale-[0.98]" href="#">
<span class="material-symbols-outlined" data-icon="report">report</span>
<span class="font-manrope text-sm">Complaints</span>
</a>
</nav>
<div class="pt-4 mt-4 border-t border-slate-100">
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-error hover:bg-error-container/20 rounded-lg transition-all duration-200 transform active:scale-[0.98]" href="#">
<span class="material-symbols-outlined" data-icon="logout">logout</span>
<span class="font-manrope text-sm">Logout</span>
</a>
</div>
</aside>
<!-- TopNavBar -->
<header class="fixed top-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-slate-200 h-16 flex items-center justify-between px-8 ml-64 w-[calc(100%-16rem)]">
<div class="flex items-center flex-1 max-w-xl">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl" data-icon="search">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-primary-container/20 focus:bg-white transition-all" placeholder="Search homeowners, lots, or records..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="w-10 h-10 flex items-center justify-center text-slate-500 hover:bg-slate-50 rounded-full transition-colors cursor-pointer active:opacity-70">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="w-10 h-10 flex items-center justify-center text-slate-500 hover:bg-slate-50 rounded-full transition-colors cursor-pointer active:opacity-70">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<div class="h-8 w-px bg-slate-200 mx-2"></div>
<div class="flex items-center gap-3 pl-2">
<div class="text-right hidden sm:block">
<p class="text-sm font-label-md text-slate-900 leading-none">Admin User</p>
<p class="text-xs text-slate-500 mt-1">Super Admin</p>
</div>
<img alt="Administrator Profile" class="w-10 h-10 rounded-full border-2 border-primary/10" data-alt="A professional headshot of a community administrator in a corporate setting. The subject is wearing business casual attire, with a soft-focus background of a modern office space. High-key, natural lighting creates a trustworthy and professional atmosphere consistent with the SubdivisionPro brand." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQqU5o3V9TCWsLR2261KOSbAdOn6HvTLMMMHy1aT8PE2gXX-s6iOpc8pv-scJjNXZn_oeMnYjFWZYsHBL9IHkFir0-qgDPvbo2zJTPDLVYLDsm2HfXXanMR37CZ9NE9S2DDXucETXS2dpqdyJJOYTVNBSUa2va2QoLnrfqNVwGzk6i3r9cZPAL4qRkbjBe9oZ-0dAUwvK34EZXnHtauux4cLF289HE9rzZtXeR7WFnL6dgIJgIQmIlNRfy9vyIPquzKKGvGFym128"/>
</div>
</div>
</header>
<!-- Main Content -->
<main class="ml-64 pt-24 pb-12 px-8 min-h-screen">
<div class="max-w-[1280px] mx-auto">
<div class="mb-8">
<h2 class="font-h1 text-h1 text-slate-900">Community Overview</h2>
<p class="font-body-md text-slate-500 mt-1">Real-time status of subdivision operations and records.</p>
</div>
<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-lg mb-xl">
<div class="bg-white p-md rounded-xl shadow-ambient border border-slate-100 flex items-center gap-4">
<div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-3xl" data-icon="house">house</span>
</div>
<div>
<p class="text-label-sm text-slate-500 font-label-sm uppercase">Total Houses</p>
<p class="text-h2 font-h2 text-slate-900">482</p>
</div>
</div>
<div class="bg-white p-md rounded-xl shadow-ambient border border-slate-100 flex items-center gap-4">
<div class="w-14 h-14 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined text-3xl" data-icon="group">group</span>
</div>
<div>
<p class="text-label-sm text-slate-500 font-label-sm uppercase">Total Residents</p>
<p class="text-h2 font-h2 text-slate-900">1,842</p>
</div>
</div>
<div class="bg-white p-md rounded-xl shadow-ambient border border-slate-100 flex items-center gap-4">
<div class="w-14 h-14 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-3xl" data-icon="task_alt">task_alt</span>
</div>
<div>
<p class="text-label-sm text-slate-500 font-label-sm uppercase">Occupied Houses</p>
<p class="text-h2 font-h2 text-slate-900">456</p>
</div>
</div>
<div class="bg-white p-md rounded-xl shadow-ambient border border-slate-100 flex items-center gap-4">
<div class="w-14 h-14 rounded-full bg-error-container flex items-center justify-center text-error">
<span class="material-symbols-outlined text-3xl" data-icon="report">report</span>
</div>
<div>
<p class="text-label-sm text-slate-500 font-label-sm uppercase">Pending Complaints</p>
<p class="text-h2 font-h2 text-slate-900">12</p>
</div>
</div>
</div>
<!-- Bento Grid Charts -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-lg mb-xl">
<!-- Bar Chart: Residents per Block -->
<div class="lg:col-span-8 bg-white p-lg rounded-2xl shadow-ambient border border-slate-100">
<div class="flex items-center justify-between mb-xl">
<h3 class="font-h3 text-h3 text-slate-900">Residents per Block</h3>
<button class="text-primary font-label-md text-sm hover:underline">Download Report</button>
</div>
<div class="h-64 flex items-end justify-between px-4 gap-4">
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-container/20 rounded-t-lg relative group h-40">
<div class="absolute bottom-0 w-full bg-primary-container rounded-t-lg transition-all duration-500 h-[85%]"></div>
</div>
<span class="text-label-sm text-slate-500 font-label-sm">Block 1</span>
</div>
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-container/20 rounded-t-lg relative group h-40">
<div class="absolute bottom-0 w-full bg-primary-container rounded-t-lg transition-all duration-500 h-[65%]"></div>
</div>
<span class="text-label-sm text-slate-500 font-label-sm">Block 2</span>
</div>
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-container/20 rounded-t-lg relative group h-40">
<div class="absolute bottom-0 w-full bg-primary-container rounded-t-lg transition-all duration-500 h-[92%]"></div>
</div>
<span class="text-label-sm text-slate-500 font-label-sm">Block 3</span>
</div>
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-container/20 rounded-t-lg relative group h-40">
<div class="absolute bottom-0 w-full bg-primary-container rounded-t-lg transition-all duration-500 h-[45%]"></div>
</div>
<span class="text-label-sm text-slate-500 font-label-sm">Block 4</span>
</div>
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-container/20 rounded-t-lg relative group h-40">
<div class="absolute bottom-0 w-full bg-primary-container rounded-t-lg transition-all duration-500 h-[78%]"></div>
</div>
<span class="text-label-sm text-slate-500 font-label-sm">Block 5</span>
</div>
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-container/20 rounded-t-lg relative group h-40">
<div class="absolute bottom-0 w-full bg-primary-container rounded-t-lg transition-all duration-500 h-[55%]"></div>
</div>
<span class="text-label-sm text-slate-500 font-label-sm">Block 6</span>
</div>
</div>
</div>
<!-- Pie Chart: Occupancy -->
<div class="lg:col-span-4 bg-white p-lg rounded-2xl shadow-ambient border border-slate-100">
<h3 class="font-h3 text-h3 text-slate-900 mb-xl">Occupancy Rate</h3>
<div class="flex flex-col items-center">
<div class="relative w-48 h-48 mb-6">
<svg class="w-full h-full transform -rotate-90">
<circle class="text-slate-100" cx="96" cy="96" fill="transparent" r="88" stroke="currentColor" stroke-width="16"></circle>
<circle class="text-primary-container" cx="96" cy="96" fill="transparent" r="88" stroke="currentColor" stroke-dasharray="552.92" stroke-dashoffset="30" stroke-width="16"></circle>
</svg>
<div class="absolute inset-0 flex flex-col items-center justify-center">
<span class="text-h2 font-h2">94.6%</span>
<span class="text-label-sm text-slate-400">Occupied</span>
</div>
</div>
<div class="w-full space-y-2">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<div class="w-3 h-3 rounded-full bg-primary-container"></div>
<span class="text-body-sm text-slate-600">Occupied</span>
</div>
<span class="text-body-sm font-semibold">456 Units</span>
</div>
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<div class="w-3 h-3 rounded-full bg-slate-200"></div>
<span class="text-body-sm text-slate-600">Vacant</span>
</div>
<span class="text-body-sm font-semibold">26 Units</span>
</div>
</div>
</div>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-lg mb-xl">
<!-- Doughnut Chart: Complaints -->
<div class="bg-white p-lg rounded-2xl shadow-ambient border border-slate-100 flex flex-col">
<h3 class="font-h3 text-h3 text-slate-900 mb-lg">Complaint Status</h3>
<div class="flex-1 flex flex-col items-center justify-center">
<div class="relative w-32 h-32 mb-6">
<svg class="w-full h-full">
<circle class="text-slate-100" cx="64" cy="64" fill="transparent" r="50" stroke="currentColor" stroke-width="12"></circle>
<circle class="text-error" cx="64" cy="64" fill="transparent" r="50" stroke="currentColor" stroke-dasharray="314.15" stroke-dashoffset="80" stroke-width="12"></circle>
<circle class="text-primary" cx="64" cy="64" fill="transparent" r="50" stroke="currentColor" stroke-dasharray="314.15" stroke-dashoffset="240" stroke-width="12"></circle>
</svg>
</div>
<div class="w-full grid grid-cols-1 gap-3">
<div class="flex items-center justify-between p-2 rounded-lg bg-slate-50">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-error"></span>
<span class="text-body-sm text-slate-600">Pending</span>
</div>
<span class="text-body-sm font-bold">12</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-slate-50">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary"></span>
<span class="text-body-sm text-slate-600">In-Progress</span>
</div>
<span class="text-body-sm font-bold">24</span>
</div>
<div class="flex items-center justify-between p-2 rounded-lg bg-slate-50">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-green-500"></span>
<span class="text-body-sm text-slate-600">Resolved</span>
</div>
<span class="text-body-sm font-bold">158</span>
</div>
</div>
</div>
</div>
<!-- Recent Activity Table Preview -->
<div class="lg:col-span-2 bg-white p-lg rounded-2xl shadow-ambient border border-slate-100">
<div class="flex items-center justify-between mb-lg">
<h3 class="font-h3 text-h3 text-slate-900">Recent Updates</h3>
<button class="bg-primary text-white px-4 py-2 rounded-lg text-label-md font-label-md shadow-md hover:bg-blue-700 transition-all active:scale-95">View All</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="border-b border-slate-100">
<th class="pb-4 font-label-sm text-slate-400 uppercase text-[11px] tracking-wider">Resident Name</th>
<th class="pb-4 font-label-sm text-slate-400 uppercase text-[11px] tracking-wider">Block/Lot</th>
<th class="pb-4 font-label-sm text-slate-400 uppercase text-[11px] tracking-wider">Activity</th>
<th class="pb-4 font-label-sm text-slate-400 uppercase text-[11px] tracking-wider">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-50">
<tr class="group hover:bg-slate-50/50 transition-colors">
<td class="py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 text-xs font-bold">JD</div>
<span class="text-body-sm font-semibold text-slate-900">Johnathan Doe</span>
</div>
</td>
<td class="py-4 text-body-sm text-slate-600">B04 L12</td>
<td class="py-4 text-body-sm text-slate-500">New Resident Added</td>
<td class="py-4">
<span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-[10px] font-bold uppercase tracking-tight">Verified</span>
</td>
</tr>
<tr class="group hover:bg-slate-50/50 transition-colors">
<td class="py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 text-xs font-bold">MS</div>
<span class="text-body-sm font-semibold text-slate-900">Maria Santos</span>
</div>
</td>
<td class="py-4 text-body-sm text-slate-600">B12 L05</td>
<td class="py-4 text-body-sm text-slate-500">Water Leakage Report</td>
<td class="py-4">
<span class="px-2 py-1 rounded-full bg-error-container text-error text-[10px] font-bold uppercase tracking-tight">Pending</span>
</td>
</tr>
<tr class="group hover:bg-slate-50/50 transition-colors">
<td class="py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 text-xs font-bold">RK</div>
<span class="text-body-sm font-semibold text-slate-900">Robert King</span>
</div>
</td>
<td class="py-4 text-body-sm text-slate-600">B01 L01</td>
<td class="py-4 text-body-sm text-slate-500">Gate Pass Requested</td>
<td class="py-4">
<span class="px-2 py-1 rounded-full bg-blue-100 text-blue-700 text-[10px] font-bold uppercase tracking-tight">Processing</span>
</td>
</tr>
<tr class="group hover:bg-slate-50/50 transition-colors">
<td class="py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 text-xs font-bold">EL</div>
<span class="text-body-sm font-semibold text-slate-900">Elena Lopez</span>
</div>
</td>
<td class="py-4 text-body-sm text-slate-600">B08 L23</td>
<td class="py-4 text-body-sm text-slate-500">Dues Payment Recorded</td>
<td class="py-4">
<span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-[10px] font-bold uppercase tracking-tight">Paid</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Promotion / Announcement Section -->
<div class="bg-primary-container rounded-2xl p-xl flex flex-col md:flex-row items-center justify-between gap-xl relative overflow-hidden">
<div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
<div class="relative z-10">
<h2 class="text-h1 font-h1 text-white mb-2">Quarterly Audit Ready</h2>
<p class="text-body-lg text-white/80 max-w-lg">All homeowner records and collection reports for Q3 are now finalized and available for export.</p>
<div class="flex gap-4 mt-8">
<button class="bg-white text-primary px-6 py-3 rounded-lg font-label-md shadow-lg hover:shadow-xl transition-all">Generate Full Report</button>
<button class="bg-transparent border border-white/40 text-white px-6 py-3 rounded-lg font-label-md hover:bg-white/10 transition-all">Archived Data</button>
</div>
</div>
<div class="hidden md:block relative z-10">
<div class="w-48 h-48 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center shadow-2xl rotate-3">
<span class="material-symbols-outlined text-white text-7xl" data-icon="auto_awesome">auto_awesome</span>
</div>
</div>
</div>
</div>
</main>
<!-- Contextual FAB -->
<button class="fixed bottom-8 right-8 w-16 h-16 bg-primary-container text-white rounded-full shadow-overlay flex items-center justify-center hover:scale-105 active:scale-95 transition-all z-50">
<span class="material-symbols-outlined text-3xl" data-icon="add">add</span>
</button>
</body></html>