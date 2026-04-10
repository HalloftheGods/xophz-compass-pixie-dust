# Pixie Dust Plugin

## [2026-01-06] - Initial Implementation

### Added
- Custom post type `compass_pixie_pixel` for storing pixel configurations
- Pre-built pixel templates for 7 common platforms:
  - Facebook Pixel
  - Google Analytics 4 (GA4)
  - Google Tag Manager (GTM)
  - Google Ads
  - TikTok Pixel
  - LinkedIn Insight Tag
  - Pinterest Tag
  - Custom Code option
- AJAX endpoints for pixel CRUD operations
- Frontend pixel injection via `wp_head`, `wp_body_open`, and `wp_footer` hooks
- Conditional pixel loading (all pages, home, single, archive, shop)
- Vue frontend with:
  - Dashboard with stats and quick-add templates
  - Pixel list with toggle switches and edit/delete actions
  - Add/edit form with type-specific fields

### Technical Details
- **Files Created**:
  - `includes/class-xophz-compass-pixie-dust-post-type.php` - Post type and CRUD
  - `src/routes/pixie-dust/pixie-dust.api.ts` - API layer
  - `src/routes/pixie-dust/routes/pixie-dust-dash/` - Dashboard
  - `src/routes/pixie-dust/routes/pixie-dust-pixels/` - Pixel list
  - `src/routes/pixie-dust/routes/pixie-dust-pixel-form/` - Add/edit form
- **Files Modified**:
  - `admin/class-xophz-compass-pixie-dust-admin.php` - AJAX handlers
  - `public/class-xophz-compass-pixie-dust-public.php` - Pixel injection
  - `includes/class-xophz-compass-pixie-dust.php` - Hook wiring
