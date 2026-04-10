# Xophz Magic Pixie Dust

> **Category:** Trajectory · **Version:** 0.0.1

Manage pixels and how they sprinkle their magic across your site.

## Description

**Magic Pixie Dust** is a centralized pixel and script manager for the COMPASS platform. Instead of editing header files or using multiple third-party plugins, Pixie Dust allows you to manage analytics pixels, tracking codes, and custom scripts globally via a unified Custom Post Type interface.

### Core Capabilities

- **Script Management** – Create, edit, and toggle tracking scripts (e.g., Google Analytics, Facebook Pixel, LinkedIn Insight) via the `compass_pixie_dust` Custom Post Type.
- **Execution Control** – Define exactly where scripts should load (Header, Body, Footer) to ensure optimal site performance.

## Requirements

- **Xophz COMPASS** parent plugin (active)
- WordPress 5.8+, PHP 7.4+

## Installation

1. Ensure **Xophz COMPASS** is installed and active.
2. Upload `xophz-compass-pixie-dust` to `/wp-content/plugins/`.
3. Activate through the Plugins menu.
4. Access via the My Compass dashboard → **Pixie Dust**.

## PHP Class Map

| Class | File | Purpose |
|---|---|---|
| `Xophz_Compass_Pixie_Dust` | `class-xophz-compass-pixie-dust.php` | Core plugin hooks |
| `Xophz_Compass_Pixie_Dust_Post_Type` | `class-xophz-compass-pixie-dust-post-type.php` | Custom Post Type for scripts |

## Frontend Routes

| Route | View | Description |
|---|---|---|
| `/pixie-dust` | Dashboard | Script and pixel management interface |

## Changelog

### 0.0.1

- Initial release with Custom Post Type for script management.
