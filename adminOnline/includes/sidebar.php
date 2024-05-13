<div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="admin.php">Tic-Tac-Toe</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="users.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Utilisateurs</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="captcha.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Captcha</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="newsletter.php" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Newsletter</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Administration</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="ticketing.php" class="sidebar-link">Ticketing</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Log du site</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>