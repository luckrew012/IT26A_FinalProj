<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Login - SubdivisionPro</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
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
        .ambient-shadow {
            shadow-color: rgba(0,0,0,0.05);
            box-shadow: 0px 1px 3px rgba(0,0,0,0.05), 0px 4px 6px rgba(0,0,0,0.02);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex items-center justify-center p-lg">
<main class="w-full max-w-md">
<!-- Logo & Brand Section -->
<div class="flex flex-col items-center mb-xl">
<div class="w-16 h-16 bg-primary-container rounded-xl flex items-center justify-center mb-md ambient-shadow overflow-hidden">
<img class="w-10 h-10 object-contain" data-alt="A clean and professional minimalist brand logo icon featuring a stylized blue house icon with geometric lines, set against a bright white-out corporate background. The design is modern, using a primary blue palette with subtle gradients, conveying trust, community management, and high-end residential software efficiency. The lighting is soft and even, highlighting the sleek vector aesthetics." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC2w9BltU5hnc_o6OZmOpFGCGNpM2XvkcaoJgbdtyFWs5DvKQZ8-p985a4L6y1fDO2SKcRcgX4Qx5hx9rfWASASq5GqwXozWpDPTDCl0FiQjYatNoiUS5Is4hKlUkwY-B87eVaq-quKON3omNz_1y1ze9qgCozcCC6uIftUE6hjygQfrYz94SbEmUcPvWfv9dyGNFYqXnbPgYGVIPep9U1GStH4aJe8-a6TBQRMQSY1jgtR5nDR8Ddv4otuqZWdGVDl0ZMneEcDJKA"/>
</div>
<h1 class="font-h2 text-h2 text-on-surface tracking-tight">SubdivisionPro</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-xs">Admin Terminal Access</p>
</div>
<!-- Login Card -->
<div class="bg-surface-container-lowest ambient-shadow rounded-xl p-xl border border-outline-variant/30">
<div class="mb-lg">
<h2 class="font-h3 text-h3 text-on-surface">Welcome back</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Enter your credentials to manage community records.</p>
</div>
<form action="#" class="space-y-lg" method="POST">
<!-- Username Field -->
<div class="space-y-sm">
<label class="font-label-md text-label-md text-on-surface block" for="username">Username</label>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none text-outline group-focus-within:text-primary transition-colors">
<span class="material-symbols-outlined text-[20px]" data-icon="person">person</span>
</div>
<input class="w-full pl-11 pr-md py-md bg-white border border-outline-variant rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all placeholder:text-outline/50" id="username" name="username" placeholder="admin_user" type="text"/>
</div>
</div>
<!-- Password Field -->
<div class="space-y-sm">
<div class="flex justify-between items-center">
<label class="font-label-md text-label-md text-on-surface block" for="password">Password</label>
<a class="text-label-sm font-label-sm text-primary hover:underline" href="#">Forgot password?</a>
</div>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none text-outline group-focus-within:text-primary transition-colors">
<span class="material-symbols-outlined text-[20px]" data-icon="lock">lock</span>
</div>
<input class="w-full pl-11 pr-md py-md bg-white border border-outline-variant rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all placeholder:text-outline/50" id="password" name="password" placeholder="••••••••" type="password"/>
</div>
</div>
<!-- Remember Me -->
<div class="flex items-center gap-sm">
<input class="w-4 h-4 text-primary border-outline-variant rounded focus:ring-primary/20" id="remember" type="checkbox"/>
<label class="text-body-sm font-body-sm text-on-surface-variant cursor-pointer" for="remember">Remember this device</label>
</div>
<!-- Login Button -->
<button class="w-full bg-primary-container text-on-primary-container font-label-md py-md rounded-lg ambient-shadow hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-sm" type="submit">
                    Sign In
                    <span class="material-symbols-outlined text-[18px]" data-icon="arrow_forward">arrow_forward</span>
</button>
</form>
</div>
<!-- Footer Actions -->
<div class="mt-lg text-center">
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Don't have an account? 
                <a class="text-primary font-label-md hover:underline ml-xs" href="#">Register</a>
</p>
</div>
<!-- System Status Indicator (Subtle UI Detail) -->
<div class="mt-2xl flex items-center justify-center gap-md">
<div class="flex items-center gap-xs">
<div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
<span class="text-[11px] font-label-sm text-outline uppercase tracking-widest">System Operational</span>
</div>
<div class="h-4 w-[1px] bg-outline-variant/30"></div>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-[14px] text-outline" data-icon="security">security</span>
<span class="text-[11px] font-label-sm text-outline uppercase tracking-widest">SSL Secure</span>
</div>
</div>
</main>
<!-- Decorative Elements (Asymmetric Layout Feel) -->
<div class="fixed top-0 right-0 p-xl hidden lg:block opacity-50 pointer-events-none">
<div class="flex flex-col items-end">
<span class="text-[120px] font-extrabold text-surface-container-high leading-none select-none">01</span>
<span class="text-h3 font-h3 text-surface-dim uppercase tracking-widest -mt-4">Authentication</span>
</div>
</div>
<div class="fixed bottom-0 left-0 p-xl hidden lg:block w-72 pointer-events-none">
<div class="bg-surface-container-high/40 p-md rounded-xl backdrop-blur-sm border border-white/50 ambient-shadow">
<p class="text-label-sm font-label-sm text-primary mb-xs">SubdivisionPro v4.2</p>
<p class="text-body-sm font-body-sm text-on-surface-variant leading-relaxed">Experience a faster way to manage homeowner records and financial collections with our refined administrative dashboard.</p>
</div>
</div>
</body></html>