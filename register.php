<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Register - SubdivisionPro</title>
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
        .auth-card-shadow {
            box-shadow: 0px 1px 3px rgba(0,0,0,0.05), 0px 4px 6px rgba(0,0,0,0.02);
        }
    </style>
</head>
<body class="bg-background font-body-md text-on-surface min-h-screen flex items-center justify-center p-gutter">
<div class="w-full max-w-[440px] flex flex-col gap-xl">
<!-- Branding Header -->
<div class="flex flex-col items-center gap-sm">
<div class="w-12 h-12 bg-primary flex items-center justify-center rounded-xl mb-md">
<span class="material-symbols-outlined text-white text-3xl" data-icon="home_work">home_work</span>
</div>
<h1 class="font-h1 text-h1 text-on-surface tracking-tight">SubdivisionPro</h1>
<p class="font-body-md text-secondary text-center">Homeowner Administrative Terminal</p>
</div>
<!-- Registration Card -->
<div class="bg-surface-container-lowest auth-card-shadow rounded-xl p-xl border border-outline-variant/30">
<div class="mb-xl">
<h2 class="font-h2 text-h2 text-on-surface">Create Account</h2>
<p class="font-body-sm text-on-surface-variant mt-xs">Register your property records and credentials.</p>
</div>
<form class="flex flex-col gap-lg" onsubmit="return false;">
<!-- Username Field -->
<div class="flex flex-col gap-sm">
<label class="font-label-md text-label-md text-on-surface" for="username">Username</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg" data-icon="person">person</span>
<input class="w-full pl-10 pr-md py-md bg-transparent border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/10 focus:border-primary outline-none transition-all font-body-sm placeholder:text-outline/50" id="username" name="username" placeholder="Enter your username" type="text"/>
</div>
</div>
<!-- Password Field -->
<div class="flex flex-col gap-sm">
<label class="font-label-md text-label-md text-on-surface" for="password">Password</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg" data-icon="lock">lock</span>
<input class="w-full pl-10 pr-10 py-md bg-transparent border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/10 focus:border-primary outline-none transition-all font-body-sm placeholder:text-outline/50" id="password" name="password" placeholder="Create a strong password" type="password"/>
<button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors" type="button">
<span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
</button>
</div>
</div>
<!-- Terms & Conditions (Contextual addition for professional registration) -->
<div class="flex items-start gap-sm">
<input class="mt-1 rounded border-outline-variant text-primary focus:ring-primary" id="terms" type="checkbox"/>
<label class="font-body-sm text-on-surface-variant" for="terms">
                        I agree to the <a class="text-primary font-medium hover:underline" href="#">Terms of Service</a> and <a class="text-primary font-medium hover:underline" href="#">Privacy Policy</a>.
                    </label>
</div>
<!-- Register Button -->
<button class="w-full bg-primary-container text-white font-label-md py-md rounded-lg hover:bg-primary transition-colors active:scale-[0.98] transform flex items-center justify-center gap-sm" type="submit">
                    Register
                    <span class="material-symbols-outlined text-md" data-icon="arrow_forward">arrow_forward</span>
</button>
</form>
<div class="mt-xl pt-lg border-t border-outline-variant/30 flex flex-col items-center gap-md">
<p class="font-body-sm text-on-surface-variant">
                    Already have an account? 
                    <a class="text-primary font-label-md hover:underline ml-xs" href="#">Login</a>
</p>
</div>
</div>
<!-- Footer Decoration / Info -->
<div class="flex flex-col items-center gap-md opacity-60">
<div class="flex gap-lg">
<div class="flex items-center gap-xs font-label-sm text-secondary">
<span class="material-symbols-outlined text-sm" data-icon="verified_user">verified_user</span>
                    SECURE ACCESS
                </div>
<div class="flex items-center gap-xs font-label-sm text-secondary">
<span class="material-symbols-outlined text-sm" data-icon="history">history</span>
                    AUDITED LOGS
                </div>
</div>
</div>
</div>
<!-- Background Decoration Image (Soft Architectural Visual) -->
<div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none opacity-5">
<img alt="Faded architectural blueprint" class="w-full h-full object-cover grayscale" data-alt="A sophisticated architectural blueprint of a modern residential subdivision, featuring clean lines, lot numbers, and planned green spaces. The visual is rendered in a minimalist technical drawing style with light grey strokes on a stark white background. The composition is expansive and precise, conveying a sense of organized community planning and structural reliability, perfectly matching a professional administrative aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAhV6y-JUzSgS-ETOLL_Yvit8_xd0ftklVhZqZLNLLLTvlA-94X347iqrIdTJcJBkeV-4Kk_QaRoattcE5iu1BPAvv8QOxeGiaulHf_op_xG9mjuEO2GR4yLY21KHr3s88oLCuCAIfi0YqqryimZhccOWZyPrVv5H0C8EqL3CLiMkj7sATdvys14KIhRtavVE5V9pcXgv6XGjmnoMIHKJNkSu_uGDbB0I1EksdXvRKszMONlexvTbJIDBz42aSxmzSi0b8V6HKuhD8"/>
</div>
</body></html>