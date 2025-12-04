# CMS scaffold for kodepress-donation

This project contains a minimal CMS scaffolding: categories, posts, galleries, gallery items, banners, and dynamic pages (sections & blocks).

Quick start

1. Run migrations:

   ```powershell
   php artisan migrate
   ```

2. Open the admin UI (scaffolded routes):
   - `http://your-app.test/admin/categories`
   - `http://your-app.test/admin/posts`
   - `http://your-app.test/admin/galleries`
   - `http://your-app.test/admin/banners`
   - `http://your-app.test/admin/pages`

Notes
- Views are minimal scaffolds in `resources/views/backend/cms/*` and use your existing backend layout.
- Page-builder (sections & blocks) data structures exist; editor UI is not fully implemented — sections and blocks can be managed via controllers or DB for now.

Next steps (optional):
- Add file upload handling (store images in `storage/app/public` and expose with `php artisan storage:link`).
- Implement AJAX editors for drag/drop page sections and blocks.
- Add authentication/authorization for admin routes.
