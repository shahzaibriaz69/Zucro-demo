<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Session Protection (Fixing the line 50 error seamlessly)
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

require_once 'db_config.php';

$msg = "";
$update_mode = false;
$id = "";
$title = "";
$description = "";
$icon = "fas fa-cogs";

// ==========================================
// 2. SERVICES BACKEND LOGIC (CRUD)
// ==========================================

// DELETE SERVICE
if (isset($_GET['delete_service'])) {
    $delete_id = intval($_GET['delete_service']);
    $stmt = $pdo->prepare("DELETE FROM agency_services WHERE id = ?");
    if ($stmt->execute([$delete_id])) {
        header("Location: admin_dashboard.php?msg=Service Deleted Successfully!");
        exit();
    }
}

// EDIT SERVICE FETCH
if (isset($_GET['edit_service'])) {
    $update_mode = true;
    $id = intval($_GET['edit_service']);
    $stmt = $pdo->prepare("SELECT * FROM agency_services WHERE id = ?");
    $stmt->execute([$id]);
    $service = $stmt->fetch();

    if ($service) {
        $title = $service['title'];
        $description = $service['description'];
        $icon = $service['icon'];
    }
}

// INSERT OR UPDATE SERVICE SUBMIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action_type']) && $_POST['action_type'] == 'service_control') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $icon = trim($_POST['icon']);

    if (!empty($title) && !empty($description)) {
        if (isset($_POST['update_id']) && !empty($_POST['update_id'])) {
            // Update
            $u_id = intval($_POST['update_id']);
            $stmt = $pdo->prepare("UPDATE agency_services SET title = ?, description = ?, icon = ? WHERE id = ?");
            $stmt->execute([$title, $description, $icon, $u_id]);
            header("Location: admin_dashboard.php?msg=Service Updated Successfully!");
            exit();
        } else {
            // Insert
            $stmt = $pdo->prepare("INSERT INTO agency_services (title, description, icon) VALUES (?, ?, ?)");
            $stmt->execute([$title, $description, $icon]);
            header("Location: admin_dashboard.php?msg=New Service Added Successfully!");
            exit();
        }
    }
}

// Fetch Services & Leads data
$services = $pdo->query("SELECT * FROM agency_services ORDER BY id DESC")->fetchAll();
$leads = $pdo->query("SELECT * FROM agency_leads ORDER BY id DESC")->fetchAll();

if (isset($_GET['msg'])) {
    $msg = htmlspecialchars($_GET['msg']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zucro Experts - Master Control Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #0B111E;
            --card-bg: rgba(255, 255, 255, 0.03);
            --accent-orange: #FF6A00;
            --accent-cyan: #06B6D4;
            --text-main: #FFFFFF;
            --text-muted: #9CA3AF;
            --border-color: rgba(255, 255, 255, 0.08);
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            font-family: 'Segoe UI', Tahoma, sans-serif;
            margin: 0;
            padding: 2rem;
        }

        .admin-container {
            max-width: 1300px;
            margin: 0 auto;
        }

        /* Navbar Area */
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        .logo-text {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.05em;
            color: #FFF;
        }

        .logo-text span {
            color: var(--accent-cyan);
        }

        .operator-badge {
            font-size: 0.85rem;
            color: var(--text-muted);
            background: rgba(6, 182, 212, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            border: 1px solid rgba(6, 182, 212, 0.2);
        }

        .btn-logout {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid #EF4444;
            color: #EF4444;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .alert-box {
            background: rgba(255, 106, 0, 0.15);
            border: 1px solid var(--accent-orange);
            color: #FF8C3A;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
        }

        /* CRUD Grid System */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1.8fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        @media (max-width: 992px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        .glass-panel {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            padding: 2rem;
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .panel-title {
            margin-top: 0;
            margin-bottom: 1.5rem;
            font-size: 1.4rem;
            font-weight: 700;
            border-left: 3px solid var(--accent-orange);
            padding-left: 0.75rem;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: #fff;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-orange);
        }

        .btn-orange {
            background: var(--accent-orange);
            color: white;
            border: none;
            padding: 0.8rem;
            font-weight: 700;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            text-transform: uppercase;
        }

        /* Dynamic Table styling */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .custom-table th {
            padding: 1rem;
            border-bottom: 2px solid var(--border-color);
            color: var(--text-muted);
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        .custom-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
        }

        .icon-box-preview {
            background: rgba(255, 106, 0, 0.1);
            color: var(--accent-orange);
            padding: 0.5rem;
            border-radius: 6px;
            margin-right: 0.75rem;
        }

        .action-links a {
            text-decoration: none;
            margin-right: 1rem;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .act-edit {
            color: var(--accent-cyan);
        }

        .act-delete {
            color: #EF4444;
        }

        /* Leads Matrix Section Styling (Matching your current view) */
        .leads-section {
            margin-top: 2rem;
        }

        .leads-badge {
            background: var(--accent-cyan);
            color: #000;
            padding: 0.2rem 0.6rem;
            border-radius: 4px;
            font-weight: 700;
            font-size: 0.8rem;
            float: right;
        }
    </style>
</head>

<body>

    <div class="admin-container">

        <div class="top-navbar">
            <div class="logo-text">ZUCRO EXPERTS <span>CONTROL PANEL</span></div>
            <div style="display: flex; gap: 1rem; align-items: center;">

                <a href="admin_logout.php"
                    style="color: var(--accent-cyan); text-decoration: none; font-size: 0.85rem; font-weight: 600; padding: 0.5rem 1rem; border: 1px solid rgba(6, 182, 212, 0.3); border-radius: 6px; background: rgba(6, 182, 212, 0.05);">
                    <i class="fas fa-globe"></i> View Website & Exit
                </a>

                <div class="operator-badge"><i class="fas fa-user"></i> Operator: Active Session</div>

                <a href="admin_logout.php" class="btn-logout">
                    <i class="fas fa-power-off"></i> Kill Session
                </a>

            </div>
        </div>

        <?php if (!empty($msg)): ?>
            <div class="alert-box"><i class="fas fa-check-circle"></i> <?php echo $msg; ?></div>
        <?php endif; ?>

        <div class="dashboard-grid">

            <div class="glass-panel">
                <h3 class="panel-title" style="border-left-color: var(--accent-orange);">
                    <?php echo $update_mode ? "Update Service Component" : "Add New Dynamic Service"; ?>
                </h3>
                <form action="admin_dashboard.php" method="POST">
                    <input type="hidden" name="action_type" value="service_control">
                    <?php if ($update_mode): ?>
                        <input type="hidden" name="update_id" value="<?php echo $id; ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Service Title</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g., AI Automation Engine"
                            value="<?php echo htmlspecialchars($title); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>FontAwesome Icon Class</label>
                        <input type="text" name="icon" class="form-control" placeholder="e.g., fas fa-robot"
                            value="<?php echo htmlspecialchars($icon); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Service Description</label>
                        <textarea name="description" class="form-control" rows="5"
                            placeholder="Enter service description details here..."
                            required><?php echo htmlspecialchars($description); ?></textarea>
                    </div>

                    <button type="submit" class="btn-orange">
                        <?php echo $update_mode ? "Apply Changes" : "Deploy Live Service Card"; ?>
                    </button>

                    <?php if ($update_mode): ?>
                        <a href="admin_dashboard.php"
                            style="display:block; text-align:center; margin-top:1rem; color:var(--text-muted); font-size:0.85rem; text-decoration:none;">Cancel
                            Edit</a>
                    <?php endif; ?>
                </form>
            </div>

            <div class="glass-panel" style="overflow-x: auto;">
                <h3 class="panel-title" style="border-left-color: var(--accent-cyan);">Active Website Services</h3>
                <?php if (count($services) > 0): ?>
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Service Specifications</th>
                                <th style="text-align: right;">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $srv): ?>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <span class="icon-box-preview"><i
                                                    class="<?php echo htmlspecialchars($srv['icon']); ?>"></i></span>
                                            <div>
                                                <strong
                                                    style="color: #fff; display: block;"><?php echo htmlspecialchars($srv['title']); ?></strong>
                                                <span
                                                    style="font-size: 0.8rem; color: var(--text-muted); display: block; max-width: 380px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    <?php echo htmlspecialchars($srv['description']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="action-links" style="text-align: right;">
                                        <a href="admin_dashboard.php?edit_service=<?php echo $srv['id']; ?>" class="act-edit"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <a href="admin_dashboard.php?delete_service=<?php echo $srv['id']; ?>"
                                            class="act-delete"
                                            onclick="return confirm('Are you sure you want to delete this service?')"><i
                                                class="fas fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">No services deployed yet. Use the left form to
                        inject data.</p>
                <?php endif; ?>
            </div>

        </div>

        <div class="glass-panel leads-section">
            <span class="leads-badge">Total Leads: <?php echo count($leads); ?></span>
            <h3 class="panel-title" style="border-left-color: #EF4444;">Acquired Growth Inquiries Matrix (Leads)</h3>

            <?php if (count($leads) > 0): ?>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Client Details</th>
                            <th>Target System</th>
                            <th>Requirements</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($leads as $ld): ?>
                            <tr>
                                <td>
                                    <strong><?php echo htmlspecialchars($ld['name'] ?? 'N/A'); ?></strong><br>
                                    <span
                                        style="font-size:0.8rem; color:var(--text-muted);"><?php echo htmlspecialchars($ld['email'] ?? 'N/A'); ?></span>
                                </td>
                                <td><span
                                        style="background:rgba(255,106,0,0.1); color:var(--accent-orange); padding:2px 6px; border-radius:4px; font-size:0.8rem;"><?php echo htmlspecialchars($ld['service'] ?? 'General'); ?></span>
                                </td>
                                <td style="color:var(--text-muted); font-size:0.85rem;">
                                    <?php echo htmlspecialchars($ld['message'] ?? ''); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="color:var(--text-muted); font-size:0.9rem;">No leads captured yet.</p>
            <?php endif; ?>
        </div>

    </div>

</body>

</html>