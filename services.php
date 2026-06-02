<?php
include 'header.php';
// 🛠️ Step 1: Database configuration file lazmi include karein
require_once 'db_config.php';

// 🛠️ Step 2: Live services matrix database pipeline se fetch karna
try {
    $service_query = $pdo->query("SELECT * FROM agency_services ORDER BY id DESC");
    $dynamic_services = $service_query->fetchAll();
} catch (PDOException $e) {
    $dynamic_services = []; // Fallback safety matrix
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services | Zucroexperts</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body style="background-color: #0B111E; color: #FFFFFF; padding: 0; margin: 0;">

    <div class="services-section-frame" style="padding-top: 8rem; padding-bottom: 2rem; text-align: center;">
        <div class="zucro-container">
            <h1
                style="font-size: 2.5rem; font-weight: 800; color: #FFFFFF; margin-bottom: 1rem; letter-spacing: -0.02em;">
                <span style="color: #FF6A00;">Our</span> Services
            </h1>
            <p style="color: #9CA3AF; max-width: 42rem; margin: 0 auto; font-size: 0.875rem; line-height: 1.6;">
                Smart Marketing. Powerful Automation. Scalable Growth. Zucroexperts delivers tailored solutions to
                automate operations, capture qualified leads, and increase conversions.
            </p>
        </div>
    </div>

    <section class="services-section-frame" style="padding: 2rem 0;">
        <div class="zucro-container">
            <div style="margin-bottom: 2.5rem; border-left: 3px solid #FF6A00; padding-left: 1rem;">
                <h2 style="font-size: 1.5rem; font-weight: 800; color: #FFFFFF; letter-spacing: -0.02em; margin: 0;">
                    Multi-Platform Advertising Solutions
                </h2>
                <p style="color: #9CA3AF; font-size: 0.875rem; margin-top: 0.25rem; margin-bottom: 0;">
                    High-converting advertising campaigns across the world’s leading digital platforms.
                </p>
            </div>

            <div class="services-hex-grid">
                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(37, 99, 235, 0.15); color: #3B82F6;">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">Meta
                            Advertising Matrix</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Facebook & Instagram Ads</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">
                            Facebook, Instagram, and Messenger ecosystems scaled with conversion funnels.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>Retargeting & Pixel Tracking</span>
                            </li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Lead
                                    Gen & E-commerce Sales</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>Audience Network Campaigns</span>
                            </li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>

                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(239, 68, 68, 0.15); color: #EF4444;">
                            <i class="fab fa-google"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">Google
                            Advertising Engine</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Search & YouTube Marketing</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">
                            Capturing high-intent users directly via search queries and premium videos.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Google
                                    Search & Display Ads</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>Performance Max & Shopping</span>
                            </li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>YouTube
                                    Ads & Conversion Tagging</span></li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>

                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(255, 106, 0, 0.15); color: #FF6A00;">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">Global
                            Channels Scaling</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            TikTok, LinkedIn & Snapchat</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">
                            Hyper-targeted traffic distribution channels across global social networks.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>TikTok
                                    Ads & Shop Marketing</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>Snapchat & Pinterest E-commerce</span>
                            </li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>LinkedIn B2B & Reddit Niche Ads</span>
                            </li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section-frame" style="padding: 2rem 0;">
        <div class="zucro-container">
            <div style="margin-bottom: 2.5rem; border-left: 3px solid #FF6A00; padding-left: 1rem;">
                <h2 style="font-size: 1.5rem; font-weight: 800; color: #FFFFFF; letter-spacing: -0.02em; margin: 0;">
                    AI Powered Marketing Solutions
                </h2>
                <p style="color: #9CA3AF; font-size: 0.875rem; margin-top: 0.25rem; margin-bottom: 0;">
                    Integrating advanced machine learning models into live operations.
                </p>
            </div>

            <div class="services-hex-grid">
                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(147, 51, 234, 0.15); color: #C084FC;">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">AI Ads
                            Optimization</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Smart Copy & Retention</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">
                            Algorithmic enhancements to capture maximum conversion retention rates.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>Predictive Copy & Creative Analysis</span>
                            </li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>AI
                                    Budget Segmentation Tracking</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Smart
                                    Target Audience Parsing</span></li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>

                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(16, 185, 129, 0.15); color: #10B981;">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">
                            Autonomous Lead Control</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Chatbots & Workflows</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">24/7
                            client onboarding via cognitive automation frameworks.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>AI
                                    Chatbots & Customer Support</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>Qualification & Appointment Systems</span>
                            </li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>WhatsApp & Email Smart Flows</span>
                            </li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>

                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(245, 158, 11, 0.15); color: #F59E0B;">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">AI
                            Analytics & Social</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Trend Mining Strategies</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">Mining
                            market trend vectors to outpace business competitor frameworks.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Social
                                    Media Content Strategy</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Trend
                                    Evaluation & Analysis</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Growth
                                    Insights Reports</span></li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section-frame" style="padding: 2rem 0;">
        <div class="zucro-container">
            <div style="margin-bottom: 2.5rem; border-left: 3px solid #FF6A00; padding-left: 1rem;">
                <h2 style="font-size: 1.5rem; font-weight: 800; color: #FFFFFF; letter-spacing: -0.02em; margin: 0;">
                    GoHighLevel (GHL) CRM & Automation
                </h2>
                <p style="color: #9CA3AF; font-size: 0.875rem; margin-top: 0.25rem; margin-bottom: 0;">
                    Centralizing business operations into highly structured, conversion-ready pipelines.
                </p>
            </div>

            <div class="services-hex-grid">
                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(236, 72, 153, 0.15); color: #EC4899;">
                            <i class="fas fa-filter"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">GHL
                            Funnels & Pipelines</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Funnel Architecture</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">
                            Architecture optimized for lead capture and pipeline tracking dashboards.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>High-Converting Landing Pages</span>
                            </li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>CRM
                                    System Configuration</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Contact
                                    Pipeline Management</span></li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>

                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(6, 182, 212, 0.15); color: #06B6D4;">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">
                            Workflow Implementations</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Instant Execution</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">
                            Replacing slow manual work structures with instant execution matrices.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Lead
                                    Follow-Up Automation</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>SMS,
                                    Email & WhatsApp Blasts</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Missed
                                    Call Text-Back Setup</span></li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>

                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(99, 102, 241, 0.15); color: #6366F1;">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">
                            Business Growth Engines</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Conversion Tracking</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">
                            Sustaining brand metrics with dynamic conversion tracking loops.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Auto
                                    Appointment Booking</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Review
                                    Collection Automation</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>GA4 /
                                    GTM Conversion Mapping</span></li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section-frame" style="padding: 2rem 0;">
        <div class="zucro-container">
            <div style="margin-bottom: 2.5rem; border-left: 3px solid #FF6A00; padding-left: 1rem;">
                <h2 style="font-size: 1.5rem; font-weight: 800; color: #FFFFFF; letter-spacing: -0.02em; margin: 0;">
                    High-End Web Engineering Systems
                </h2>
                <p style="color: #9CA3AF; font-size: 0.875rem; margin-top: 0.25rem; margin-bottom: 0;">
                    Engineered natively with highly optimized backend control structures for scale.
                </p>
            </div>

            <div class="services-hex-grid">
                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(139, 92, 246, 0.15); color: #A78BFA;">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">Backend
                            Architecture</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            PHP & MySQL Systems</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">
                            Performance-optimized dynamic frameworks built for extreme load speeds.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>PHP,
                                    MySQL, & Clean CRUD Architecture</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Secure
                                    Admin Dashboards & Data Metrics</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Custom
                                    API Configurations</span></li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>

                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(20, 184, 166, 0.15); color: #2DD4BF;">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">
                            E-Commerce Platforms</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Shopify & WordPress</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">Digital
                            store systems coded natively or scaled on modern platforms.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Shopify
                                    & WordPress Architecture</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>Inventory & Order Control Workflows</span>
                            </li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Payment
                                    Gateways & WhatsApp Triggers</span></li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>

                <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                    <div>
                        <div class="service-icon-box"
                            style="background-color: rgba(244, 63, 94, 0.15); color: #FB7185;">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">UI/UX &
                            Deployment</h3>
                        <p
                            style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                            Speed & Core Framework</p>
                        <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">Clean
                            premium front-ends coupled with full lifecycle server deployment.</p>
                        <ul class="service-bullet-list">
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>Enterprise UI/UX Core Design Layouts</span>
                            </li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Server
                                    Infrastructure Deployment</span></li>
                            <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                <span>Database Optimization & Safety Locks</span>
                            </li>
                        </ul>
                    </div>
                    <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 🚀 NEW DYNAMIC SECTION: Custom Developed & On-Demand Solutions (Exactly like others) -->
    <?php if (!empty($dynamic_services)): ?>
        <section class="services-section-frame" style="padding: 2rem 0;">
            <div class="zucro-container">
                <div style="margin-bottom: 2.5rem; border-left: 3px solid #FF6A00; padding-left: 1rem;">
                    <h2 style="font-size: 1.5rem; font-weight: 800; color: #FFFFFF; letter-spacing: -0.02em; margin: 0;">
                        Custom Developed & On-Demand Solutions
                    </h2>
                    <p style="color: #9CA3AF; font-size: 0.875rem; margin-top: 0.25rem; margin-bottom: 0;">
                        Dynamic operations deployed on-demand through our central database management system.
                    </p>
                </div>

                <div class="services-hex-grid">
                    <?php foreach ($dynamic_services as $srv): ?>
                        <div class="premium-glass-card service-matrix-card" style="padding: 2rem;">
                            <div>
                                <!-- Icon and Color Accent matched to #FF6A00 -->
                                <div class="service-icon-box"
                                    style="background-color: rgba(255, 106, 0, 0.15); color: #FF6A00;">
                                    <i class="<?php echo htmlspecialchars($srv['icon'] ?: 'fas fa-cogs'); ?>"></i>
                                </div>
                                <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF; margin-bottom: 0.5rem;">
                                    <?php echo htmlspecialchars($srv['title']); ?>
                                </h3>
                                <p
                                    style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #FF6A00; margin-bottom: 1rem; letter-spacing: 0.05em;">
                                    Dynamic Business Unit
                                </p>
                                <p style="font-size: 0.875rem; color: #9CA3AF; line-height: 1.5; margin-bottom: 1.5rem;">
                                    <?php echo htmlspecialchars($srv['description']); ?>
                                </p>
                                <ul class="service-bullet-list">
                                    <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i>
                                        <span>On-Demand Setup & Custom Integration</span>
                                    </li>
                                    <li><i class="fas fa-check" style="color: #FF6A00; margin-right: 0.5rem;"></i> <span>Managed
                                            Control Panel Scalability</span></li>
                                </ul>
                            </div>
                            <!-- Button class matched to your premium orange gradient -->
                            <a href="#contact" class="service-deploy-btn featured-btn-modifier">Let's Discuss Project</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <div style="padding: 4rem 0; text-align: center;">
        <div class="zucro-container">
            <a href="index.php" class="btn-explore-packages">
                <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i> Back to Home
            </a>
        </div>
    </div>

</body>

</html>

<?php include 'footer.php'; ?>