<?php
include 'header.php';


// 1. Saari services ka detailed data array me store kiya hai
$servicesData = [
    'meta-ads' => [
        'title' => 'Meta Advertising Matrix',
        'subtitle' => 'Facebook & Instagram Ads',
        'icon' => 'fab fa-facebook-f',
        'icon_color' => '#3B82F6',
        'bg_color' => 'rgba(37, 99, 235, 0.15)',
        'description' => 'Scale your brand across the global Facebook, Instagram, and Messenger ecosystem. We build deep conversion funnels designed to acquire customers efficiently.',
        'details' => 'Our Meta Ad setups integrate server-side tracking (Conversions API) to completely bypass browser cookie restrictions. We test dozens of creative hooks, predictive copywriting frameworks, and lookalike audience segmentations to find the exact matrix that yields positive ROI for your business models.',
        'features' => ['Advanced Retargeting Engine', 'Custom Pixel & Conversions API Setup', 'E-commerce Purchase Funnels', 'Audience Network Strategic Distribution']
    ],
    'google-ads' => [
        'title' => 'Google Advertising Engine',
        'subtitle' => 'Search & YouTube Marketing',
        'icon' => 'fab fa-google',
        'icon_color' => '#EF4444',
        'bg_color' => 'rgba(239, 68, 68, 0.15)',
        'description' => 'Intercept high-intent prospects precisely when they search for your services or browse YouTube videos.',
        'details' => 'Google Ads allows you to capture buyers right at the bottom of the consideration funnel. We construct structured search ad groups, negative keyword safety-locks, and hyper-targeted Performance Max setups that maximize every dollar spent.',
        'features' => ['Intent-Based Search Campaigns', 'Performance Max Setup', 'YouTube In-Stream Video Ads', 'Google Shopping Infrastructure Management']
    ],
    'global-scaling' => [
        'title' => 'Global Channels Scaling',
        'subtitle' => 'TikTok, LinkedIn & Snapchat',
        'icon' => 'fas fa-share-alt',
        'icon_color' => '#FF6A00',
        'bg_color' => 'rgba(255, 106, 0, 0.15)',
        'description' => 'Expand beyond traditional channels to capture modern trend vectors and professional B2B clients.',
        'details' => 'Whether you need creative, organic-feeling TikTok Shop ads or high-level LinkedIn account-based marketing pipelines for enterprise B2B sales, we craft distinct assets tailored to each channel rules.',
        'features' => ['TikTok Commerce Ads & Spark Hooks', 'LinkedIn Enterprise B2B Target Structures', 'Snapchat & Pinterest Retargeting Frameworks', 'Niche Marketing Subreddit Integrations']
    ],
    'ai-optimization' => [
        'title' => 'AI Ads Optimization',
        'subtitle' => 'Smart Copy & Retention',
        'icon' => 'fas fa-brain',
        'icon_color' => '#C084FC',
        'bg_color' => 'rgba(147, 51, 234, 0.15)',
        'description' => 'Infuse mathematical and machine learning analytics directly into creative asset iterations.',
        'details' => 'No more guessing what creative works. We deploy modern algorithmic intelligence models to evaluate high-performing copies and audience retention metrics automatically.',
        'features' => ['Predictive Copy Frameworks', 'Autonomous Budget Cross-Segmentation', 'Behavioral Pattern Target Parsing', 'Creative Lifetime Retention Analytics']
    ],
    'autonomous-leads' => [
        'title' => 'Autonomous Lead Control',
        'subtitle' => 'Chatbots & Workflows',
        'icon' => 'fas fa-robot',
        'icon_color' => '#10B981',
        'bg_color' => 'rgba(16, 185, 129, 0.15)',
        'description' => 'Never let a live lead go cold with 24/7 client response ecosystems.',
        'details' => 'We program conversational automation layers that instant-qualify fresh incoming inquiries, answer core FAQs natively, and sync direct calendar schedules without manual human interaction blocks.',
        'features' => ['AI Chatbot Infrastructure Setup', 'Automatic Qualification Routines', 'Multi-Channel Calendar Booking Triggers', 'WhatsApp, Email & CRM Crossflows']
    ],
    'ai-analytics' => [
        'title' => 'AI Analytics & Social',
        'subtitle' => 'Trend Mining Strategies',
        'icon' => 'fas fa-chart-pie',
        'icon_color' => '#F59E0B',
        'bg_color' => 'rgba(245, 158, 11, 0.15)',
        'description' => 'Extract data-driven market insights to decisively outpace competitive brand environments.',
        'details' => 'We perform deep trend evaluation metrics that show exactly what formats, content systems, and social strategy paths your audience is looking for.',
        'features' => ['Data Trend Optimization Vectoring', 'Competitor Brand Framework Audit', 'Dynamic Social Growth Strategy Architecture', 'Insight Performance Reporting Maps']
    ],
    'ghl-funnels' => [
        'title' => 'GHL Funnels & Pipelines',
        'subtitle' => 'Funnel Architecture',
        'icon' => 'fas fa-filter',
        'icon_color' => '#EC4899',
        'bg_color' => 'rgba(236, 72, 153, 0.15)',
        'description' => 'Architect high-end system architectures customized fully for conversion layouts within GoHighLevel.',
        'details' => 'We build complete user landing layouts and pipeline visualization dashboards inside GoHighLevel so you know exactly where a lead stands.',
        'features' => ['Premium High-Converting Landing Environments', 'GHL Custom Variable Setup', 'Pipeline Status Metrics & Dashboards', 'Lead Tagging System Matrix']
    ],
    'ghl-workflows' => [
        'title' => 'Workflow Implementations',
        'subtitle' => 'Instant Execution',
        'icon' => 'fas fa-project-diagram',
        'icon_color' => '#06B6D4',
        'bg_color' => 'rgba(6, 182, 212, 0.15)',
        'description' => 'Automate tedious administrative bottlenecks with structured conditional pathways.',
        'details' => 'From database sorting rules to conditional email follow-ups, we map out powerful custom trigger frameworks tailored for lightning-fast internal actions.',
        'features' => ['Multi-Stage Follow-up Automation Rules', 'SMS & Voice Call Event Drops', 'Missed Call Text-Back Operations', 'Database Tag Sorting Ecosystems']
    ],
    'growth-engines' => [
        'title' => 'Business Growth Engines',
        'subtitle' => 'Conversion Tracking',
        'icon' => 'fas fa-rocket',
        'icon_color' => '#6366F1',
        'bg_color' => 'rgba(99, 102, 241, 0.15)',
        'description' => 'Link sales performance data flawlessly across modern attribution hubs.',
        'details' => 'We optimize your analytical pipeline via modern tracking loops, allowing your business logic frameworks to properly map tracking metrics accurately.',
        'features' => ['GA4 and Google Tag Manager Integrations', 'Attribution Loops Configurations', 'Automatic Online Review Workflows', 'Dynamic Client Scheduling Nodes']
    ],
    'backend-architecture' => [
        'title' => 'Full-Stack Web & WordPress Development',
        'subtitle' => 'PHP, Node.js, Next.js & Advanced CMS Ecosystem',
        'icon' => 'fas fa-code',
        'icon_color' => '#A78BFA',
        'bg_color' => 'rgba(139, 92, 246, 0.15)',
        'description' => 'Comprehensive enterprise-grade development leveraging both robust PHP/Laravel environments and modern JavaScript full-stack architectures alongside expert WordPress engineering.',
        'details' => 'Delivering high-performance web applications, fast server-side rendered platforms, and fully tailored content management systems built for ultimate speed and scalability.',
        'features' => [
            'Backend & Runtimes: PHP (Laravel), Node.js (Express), Composer & NPM',
            'Modern Frontend Frameworks: React, Next.js (SSR/ISR), TypeScript, JavaScript (ES6+)',
            'Styling & Responsive UI: Tailwind CSS, Bootstrap 5, Material UI, Figma-to-Code',
            'Databases & Query Tuning: MySQL, MongoDB, Relational & Non-Relational Architectures',
            'WordPress & E-Commerce Tools: Custom Themes/Plugins, Elementor Pro, WooCommerce, REST APIs',
            'DevOps & Version Control: Git/GitHub, Docker Containers, CI/CD Pipelines, Cloud Deployment'
        ]
    ],
    'ecommerce-platforms' => [
        'title' => 'E-Commerce Platforms',
        'subtitle' => 'Shopify & WordPress',
        'icon' => 'fas fa-shopping-bag',
        'icon_color' => '#2DD4BF',
        'bg_color' => 'rgba(20, 184, 166, 0.15)',
        'description' => 'Premium, dynamic enterprise storefront structures built using clean web frameworks.',
        'details' => 'Scale your product inventory smoothly across modern structures. We map optimized cart flows, robust checkout systems, and secure inventory handlers to scale high volume.',
        'features' => ['Liquid & WordPress Custom Theme Structuring', 'Automated Warehouse Inventory Workflows', 'Payment Gateways API Integration', 'Instant Purchase Event Triggers']
    ],
    'uiux-deployment' => [
        'title' => 'UI/UX & Deployment',
        'subtitle' => 'Speed & Core Framework',
        'icon' => 'fas fa-tachometer-alt',
        'icon_color' => '#FB7185',
        'bg_color' => 'rgba(244, 63, 94, 0.15)',
        'description' => 'Bespoke UI styling integrated directly onto production servers securely.',
        'details' => 'We code dark themes, responsive components, and fluid layouts with high visual clarity, while wrapping production server structures with strict optimization configurations.',
        'features' => ['Responsive Design & Glassmorphic Accent Layouts', 'Full Server Deployment & SSL Setup', 'Asset Bundling & Database Safety Optimization', 'Core Web Vitals Speed Auditing']
    ]
];

// 2. URL Parameter fetch karna (?service=name)
$slug = isset($_GET['service']) ? $_GET['service'] : '';

// 3. Agar service parameter invalid ho, to redirect karein ya generic fallback lagayein
if (!array_key_exists($slug, $servicesData)) {
    echo "<script>window.location.href='services.php';</script>";
    exit;
}

$currentService = $servicesData[$slug];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $currentService['title']; ?> | Zucroexperts
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body style="background-color: #0B111E; color: #FFFFFF; font-family: sans-serif; padding: 0; margin: 0;">

    <!-- Detail Hero Block -->
    <div
        style="padding-top: 8rem; padding-bottom: 4rem; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05);">
        <div class="zucro-container" style="max-width: 50rem; margin: 0 auto; padding: 0 1rem;">

            <!-- Dynamic Icon Box -->
            <div
                style="background-color: <?php echo $currentService['bg_color']; ?>; color: <?php echo $currentService['icon_color']; ?>; width: 4.5rem; height: 4.5rem; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1.5rem auto;">
                <i class="<?php echo $currentService['icon']; ?>"></i>
            </div>

            <h1
                style="font-size: 2.75rem; font-weight: 800; color: #FFFFFF; margin-bottom: 0.5rem; letter-spacing: -0.02em;">
                <?php echo $currentService['title']; ?>
            </h1>

            <p
                style="font-size: 0.875rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 2rem; letter-spacing: 0.05em;">
                <?php echo $currentService['subtitle']; ?>
            </p>

            <p style="color: #9CA3AF; font-size: 1.125rem; line-height: 1.6; margin-bottom: 0;">
                <?php echo $currentService['description']; ?>
            </p>
        </div>
    </div>

    <!-- Main Content Breakdown Section -->
    <section style="padding: 4rem 0;">
        <div class="zucro-container"
            style="max-width: 60rem; margin: 0 auto; padding: 0 1rem; display: flex; flex-wrap: wrap; gap: 3rem;">

            <!-- Left Narrative Column -->
            <div style="flex: 1 1 30rem;">
                <h2
                    style="font-size: 1.75rem; font-weight: 800; color: #FFFFFF; margin-bottom: 1.5rem; border-left: 3px solid #FF6A00; padding-left: 1rem;">
                    Service Operational Overview
                </h2>
                <p style="color: #9CA3AF; font-size: 1rem; line-height: 1.7; text-align: justify;">
                    <?php echo $currentService['details']; ?>
                </p>
            </div>

            <!-- Right Bullet Core Features Column -->
            <div
                style="flex: 1 1 20rem; background-color: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 2rem; border-radius: 16px; backdrop-filter: blur(8px);">
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-top: 0; margin-bottom: 1.5rem;">
                    Key Deliverables Included
                </h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <?php foreach ($currentService['features'] as $feature): ?>
                        <li
                            style="margin-bottom: 1rem; display: flex; align-items: flex-start; font-size: 0.935rem; color: #E5E7EB; line-height: 1.4;">
                            <i class="fas fa-check" style="color: #FF6A00; margin-right: 0.75rem; margin-top: 0.25rem;"></i>
                            <span>
                                <?php echo $feature; ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </section>

    <!-- Navigation Control Actions -->
    <div style="padding-bottom: 6rem; text-align: center;">
        <div class="zucro-container" style="display: flex; justify-content: center; gap: 1.5rem;">
            <a href="services.php"
                style="text-decoration: none; display: inline-flex; align-items: center; background-color: transparent; border: 1px solid rgba(255,255,255,0.15); color: #FFFFFF; padding: 0.75rem 1.5rem; border-radius: 8px; font-weight: 600; font-size: 0.875rem; cursor: pointer; transition: background 0.2s;">
                <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i> All Services
            </a>
            <a href="contact.php"
                style="text-decoration: none; display: inline-flex; align-items: center; background-color: #FF6A00; color: #FFFFFF; padding: 0.75rem 1.5rem; border-radius: 8px; font-weight: 600; font-size: 0.875rem; cursor: pointer; transition: opacity 0.2s;">
                Get Started <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
            </a>
        </div>
    </div>

</body>

</html>

<?php include 'footer.php'; ?>