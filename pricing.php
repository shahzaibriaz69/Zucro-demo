<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Plans // Zucro Experts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#03070C] text-white antialiased">

    <section class="pricing-section-frame min-h-screen flex flex-col justify-center">
        <div class="pricing-ambient-glow"></div>

        <div class="zucro-container relative z-10 px-4 mx-auto max-w-7xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span
                    class="px-3 py-1 text-xs font-mono tracking-widest text-[#FF6A00] bg-[#FF6A00]/10 rounded-full border border-[#FF6A00]/20 uppercase">
                    Flexible Investment Scalability
                </span>
                <h2 class="text-4xl max-md:text-3xl font-extrabold text-white mt-4 mb-4 tracking-tight">
                    Transparent Packages Built For <span class="text-[#FF6A00]">Predictable ROI</span>
                </h2>
                <p class="text-gray-400 text-sm">
                    No hidden operational retention leaks. Select your baseline framework model or toggle standard local
                    currencies instantly.
                </p>

                <div class="currency-switcher-container">
                    <span class="currency-label active-mode" id="label-usd">Global USD ($)</span>
                    <button id="currency-toggle-btn" class="toggle-track-btn" aria-label="Toggle Currency">
                        <div id="switcher-circle" class="toggle-thumb-node"></div>
                    </button>
                    <span class="currency-label" id="label-pkr">Maqami PKR (Rs)</span>
                </div>
            </div>

            <div class="pricing-cards-matrix-grid">

                <div
                    class="premium-pricing-card border-white/5 group hover:border-[#FF6A00]/20 transition-all duration-500">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Digital Marketing</h3>
                        <div class="currency-price" id="price-marketing" data-usd="$500" data-pkr="PKR 60,000">
                            $500<span class="price-suffix">/ mo</span>
                        </div>
                        <hr class="border-white/5 mb-6">
                        <ul class="space-y-3.5 text-xs text-gray-400">
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Facebook, Instagram & TikTok Ads</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Google & YouTube Ads Integration</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Advanced Sales Funnel Strategy</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Retargeting Campaigns Matrix</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Advanced Predictive Audience Testing</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Daily Campaign Optimization & CAPI</span>
                            </li>
                        </ul>
                    </div>
                    <a href="index.php#contact"
                        class="btn-zucro-secondary text-center text-xs py-3 mt-8 block w-full group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">Deploy
                        Premium Ads</a>
                </div>

                <div
                    class="premium-pricing-card group border-[#FF6A00]/30 bg-gradient-to-b from-[#132A42]/10 to-transparent shadow-[0_20px_50px_rgba(255,106,0,0.05)]">
                    <span
                        class="absolute -top-3 left-6 px-3 py-0.5 text-[9px] font-mono tracking-widest text-black bg-[#FF6A00] rounded-md font-extrabold uppercase z-20">Most
                        Demanded</span>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">eCommerce Management</h3>
                        <div class="currency-price" id="price-ecommerce" data-usd="$650" data-pkr="PKR 80,000">
                            $650<span class="price-suffix">/ mo</span>
                        </div>
                        <hr class="border-white/5 mb-6">
                        <ul class="space-y-3.5 text-xs text-gray-400">
                            <li class="flex items-start gap-3"><i class="fas fa-bolt text-[#FF6A00] mt-0.5"></i>
                                <span>Full Shopify Store Management</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-bolt text-[#FF6A00] mt-0.5"></i>
                                <span>Amazon PL & TikTok Shop Scaling</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-bolt text-[#FF6A00] mt-0.5"></i>
                                <span>Winning Product Research Diagnostics</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-bolt text-[#FF6A00] mt-0.5"></i>
                                <span>Advanced Product SEO & CRO Mockups</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-bolt text-[#FF6A00] mt-0.5"></i>
                                <span>Sales Funnel & Email Architecture</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-bolt text-[#FF6A00] mt-0.5"></i>
                                <span>Store Speed & Branding Architecture</span>
                            </li>
                        </ul>
                    </div>
                    <a href="index.php#contact"
                        class="btn-zucro-primary text-center text-xs py-3 mt-8 block w-full shadow-[0_0_20px_rgba(255,106,0,0.2)]">Scale
                        My Digital Store</a>
                </div>

                <div
                    class="premium-pricing-card border-white/5 group hover:border-[#FF6A00]/20 transition-all duration-500">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Website Development</h3>
                        <div class="currency-price" id="price-webdev" data-usd="$1,000" data-pkr="PKR 80,000">
                            $1,000<span class="price-suffix">/ start</span>
                        </div>
                        <hr class="border-white/5 mb-6">
                        <ul class="space-y-3.5 text-xs text-gray-400">
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Custom Coded Dynamic Node Website</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Advanced Enterprise UI/UX Core Design</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Secure Admin Dashboards & APIs</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>High-Speed Performance Frame Lock</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>eCommerce Custom Architecture</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Full Server Deployment Support</span>
                            </li>
                        </ul>
                    </div>
                    <a href="index.php#contact"
                        class="btn-zucro-secondary text-center text-xs py-3 mt-8 block w-full group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">Launch
                        Custom System</a>
                </div>

                <div
                    class="premium-pricing-card border-white/5 group hover:border-[#FF6A00]/20 transition-all duration-500">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Social Media Premium</h3>
                        <div class="currency-price" id="price-smm" data-usd="$350" data-pkr="PKR 40,000">
                            $350<span class="price-suffix">/ mo</span>
                        </div>
                        <hr class="border-white/5 mb-6">
                        <ul class="space-y-3.5 text-xs text-gray-400">
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>FB, Insta, TikTok, LinkedIn & Pinterest</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>25 Premium Posts & 20 Story Designs</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Professional Reels Hooks & Strategies</span>
                            </li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i>
                                <span>Advanced Audience Inbox Handling</span>
                            </li>
                        </ul>
                    </div>
                    <a href="index.php#contact"
                        class="btn-zucro-secondary text-center text-xs py-3 mt-8 block w-full group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">Retain
                        Premium Social</a>
                </div>

                <div
                    class="premium-pricing-card border-white/5 group hover:border-[#FF6A00]/20 transition-all duration-500 grid-span-full-row">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Graphic Designing Premium</h3>
                        <div class="currency-price" id="price-graphics" data-usd="$280" data-pkr="PKR 35,000">
                            $280<span class="price-suffix">/ mo</span>
                        </div>
                        <hr class="border-white/5 mb-6">
                        <div class="list-flex-split-wrapper">
                            <ul class="space-y-3.5 text-xs text-gray-400">
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i> <span>Premium Social
                                        Creatives & Logos</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i> <span>High-Conversion Ad
                                        Creatives Vectors</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i> <span>Carousel & Infinite
                                        Grid Formats</span></li>
                            </ul>
                            <ul class="space-y-3.5 text-xs text-gray-400">
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i> <span>Professional
                                        Attention-Grabbing Thumbnails</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i> <span>Unlimited
                                        Systematic Revisions</span></li>
                                <li class="flex items-start gap-3"><i
                                        class="fas fa-check-circle text-[#FF6A00] mt-0.5"></i> <span>High-End Brand
                                        Visual Strategy</span></li>
                            </ul>
                        </div>
                    </div>
                    <a href="index.php#contact"
                        class="btn-zucro-secondary text-center text-xs py-3 mt-8 block w-full group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">Acquire
                        Design Matrix</a>
                </div>

            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>

<?php include 'footer.php'; ?>