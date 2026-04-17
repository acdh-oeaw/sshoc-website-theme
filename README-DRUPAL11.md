# Arcadia 11 (from Drupal 7 Arcadia)

This folder is a direct clone of the legacy Arcadia theme with a Drupal 11-compatible wrapper:

- `arcadia11.info.yml`
- `arcadia11.libraries.yml`
- `arcadia11.theme`
- Twig templates in `templates/layout` and `templates/block`
- Original CSS/JS/images/fonts copied from D7 theme

## Install in a Drupal 11 codebase

1. Copy this folder to:
   - `web/themes/custom/arcadia11`
2. Enable and set default theme:
   - `drush theme:enable arcadia11`
   - `drush config:set system.theme default arcadia11 -y`
3. Place blocks into the legacy regions (especially `globalmenu`, `slider`, `content`, `sidebar_second`, `footer`).

## Important limitations

- This is a compatibility port, not a full modern refactor.
- Legacy JS libraries (Revolution Slider, old jQuery plugins) are included; some behavior may still need fixes in D11.
- Many old `.tpl.php` files are kept only as reference and are **not used** by D11.
- You should progressively migrate custom node/view templates to Twig as needed.

## Settings migrated

Theme settings are exposed in Appearance -> Settings for Arcadia 11:

- top header message
- services/news block titles
- footer texts (columns and bottom rows)
- optional analytics snippet

## Recommended next cleanup pass

1. Remove unused legacy JS plugins.
2. Port only templates you actually use from old `templates/*.tpl.php` to Twig.
3. Replace legacy Bootstrap/jQuery UI assets with maintained D11 front-end tooling.

## Second-pass templates ported (D7 -> D11)

### Node templates

- `templates/node.tpl.php` -> `templates/content/node.html.twig`
- `templates/node--news.tpl.php` -> `templates/content/node--news.html.twig`
- `templates/events/node--event.tpl.php` -> `templates/content/node--event.html.twig`
- `templates/node--deliverable.tpl.php` -> `templates/content/node--deliverable.html.twig`
- `templates/node--video.tpl.php` -> `templates/content/node--video.html.twig`
- `templates/node--scientific_publications.tpl.php` -> `templates/content/node--scientific-publications.html.twig`
- `templates/node--q_a_with_researches.tpl.php` -> `templates/content/node--q-a-with-researches.html.twig`
- `templates/node--catalogue.tpl.php` -> `templates/content/node--catalogue.html.twig`

Compatibility aliases were also added for underscore template names:

- `templates/content/node--scientific_publications.html.twig`
- `templates/content/node--q_a_with_researches.html.twig`

### Views templates

- `templates/events/views-view-unformatted--events--block.tpl.php` -> `templates/views/views-view-unformatted--events--block.html.twig`
- `templates/events/views-view-fields--events--block.tpl.php` -> `templates/views/views-view-fields--events--block.html.twig`
- `templates/events/views-view-fields--events--block-1.tpl.php` -> `templates/views/views-view-fields--events--block-1.html.twig`
- `templates/events/views-view-fields--events--block-2.tpl.php` -> `templates/views/views-view-fields--events--block-2.html.twig`
- `templates/news/views-view--news--block.tpl.php` -> `templates/views/views-view--news--block.html.twig`
- `templates/news/views-view-unformatted--news--block.tpl.php` -> `templates/views/views-view-unformatted--news--block.html.twig`
- `templates/news/views-view-fields--news--block.tpl.php` -> `templates/views/views-view-fields--news--block.html.twig`
- `templates/partners/views-view-unformatted--partners--block.tpl.php` -> `templates/views/views-view-unformatted--partners--block.html.twig`
- `templates/partners/views-view-fields--partners--block.tpl.php` -> `templates/views/views-view-fields--partners--block.html.twig`
- `templates/services/views-view-unformatted--our-services--block.tpl.php` -> `templates/views/views-view-unformatted--our-services--block.html.twig`
- `templates/services/views-view-fields--our-services--block.tpl.php` -> `templates/views/views-view-fields--our-services--block.html.twig`
- `templates/views-view--scientific_publications--block_1.tpl.php` -> `templates/views/views-view--scientific-publications--block-1.html.twig`
- `templates/views-view-unformatted--scientific_publications--block_1.tpl.php` -> `templates/views/views-view-unformatted--scientific-publications--block-1.html.twig`
- `templates/views-view-fields--scientific_publications--block_1.tpl.php` -> `templates/views/views-view-fields--scientific-publications--block-1.html.twig`
- `templates/views-view-unformatted--publications--page.tpl.php` -> `templates/views/views-view-unformatted--publications--page.html.twig`
- `templates/views-view-unformatted--og-members--block_4.tpl.php` -> `templates/views/views-view-unformatted--og-members--block-4.html.twig`
- `templates/testimonials/views-view-unformatted--testimonials--block.tpl.php` -> `templates/views/views-view-unformatted--testimonials--block.html.twig`

Compatibility aliases were also added for underscore view template names:

- `templates/views/views-view--scientific_publications--block_1.html.twig`
- `templates/views/views-view-unformatted--scientific_publications--block_1.html.twig`
- `templates/views/views-view-fields--scientific_publications--block_1.html.twig`
- `templates/views/views-view-unformatted--og_members--block_4.html.twig`
- `templates/views/views-view-unformatted--our_services--block.html.twig`
- `templates/views/views-view-fields--our_services--block.html.twig`

### Extra preprocessing added

- `arcadia11_preprocess_node()` now provides:
  - `catalogue_icon` for the old service icon mapping.
  - `catalogue_related` arrays for related `deliverable`, `news`, and `event` nodes linked by `field_catalogue`.
