<style>
    .qdop-sidebar-head {
        background: #ffffff;
        border-bottom: 2px solid #a98e47;
        padding: 0 1.25rem;
    }
    .qdop-sidebar-body {
        background: linear-gradient(180deg, #1b2d61 0%, #132046 100%);
        display: flex;
        flex-direction: column;
        height: calc(100% - 65px);
    }
    .qdop-sidebar-body .nk-sidebar-content {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .qdop-sidebar-body .nk-sidebar-menu {
        flex: 1 1 auto;
        padding: 1.25rem 0.75rem;
    }
    .qdop-nav-label {
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.45);
        padding: 0.5rem 0.85rem 0.4rem;
    }
    .qdop-sidebar-body .nk-menu-link {
        border-radius: 8px;
        padding: 0.65rem 0.85rem;
        margin-bottom: 0.25rem;
        color: rgba(255, 255, 255, 0.82) !important;
        transition: background-color 0.18s ease, color 0.18s ease, transform 0.15s ease;
        border-left: 3px solid transparent;
    }
    .qdop-sidebar-body .nk-menu-link .nk-menu-icon {
        color: rgba(255, 255, 255, 0.68) !important;
        font-size: 1.1rem;
        width: 28px;
        transition: color 0.18s ease;
    }
    .qdop-sidebar-body .nk-menu-link:hover {
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff !important;
    }
    .qdop-sidebar-body .nk-menu-link:hover .nk-menu-icon {
        color: #e2c574 !important;
    }
    .qdop-sidebar-body .nk-menu-item.active > .nk-menu-link {
        background: rgba(201, 169, 89, 0.18);
        border-left-color: #c9a959;
        color: #ffffff !important;
        font-weight: 600;
    }
    .qdop-sidebar-body .nk-menu-item.active > .nk-menu-link .nk-menu-icon {
        color: #e2c574 !important;
    }
    .qdop-sidebar-body .nk-menu-sub {
        padding-left: 1.6rem;
        margin-bottom: 0.35rem;
    }
    .qdop-sidebar-body .nk-menu-sub .nk-menu-link {
        padding: 0.45rem 0.75rem;
        font-size: 0.84rem;
        border-left: none;
    }
    .qdop-sidebar-footer {
        margin-top: auto;
        padding: 0.9rem 1rem 1.15rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(10, 18, 40, 0.32);
    }
    .qdop-sidebar-user {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        margin-bottom: 0.65rem;
    }
    .qdop-sidebar-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #a98e47;
        color: #ffffff;
        font-weight: 700;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .qdop-sidebar-user-meta {
        min-width: 0;
    }
    .qdop-sidebar-user-name {
        color: #ffffff;
        font-size: 0.82rem;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .qdop-sidebar-user-role {
        color: rgba(255, 255, 255, 0.55);
        font-size: 0.72rem;
    }
    .qdop-sidebar-signout {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 0.65rem;
        border-radius: 6px;
        color: rgba(255, 255, 255, 0.75);
        font-size: 0.8rem;
        font-weight: 500;
        text-decoration: none;
        transition: background-color 0.18s ease, color 0.18s ease;
    }
    .qdop-sidebar-signout:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
    }
</style>

