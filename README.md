# Podcast Core Theme

A block (full site editing) theme for podcast websites. Designed to work with [Podcast Core Plugin](https://github.com/rufusinfabula/podcast-core-plugin).

> Status: early development (0.2.0). Not ready for production.

## Features

- Home page: hero (with optional crossfade slideshow), latest episodes, latest news
- Episode page with the Podcast Core **Episode Player** block, series and previous/next links
- Episode archive and series archives with episode number on each card
- Search overlay in the header and search results **grouped by type** (episodes, news, pages)
- Platform buttons and footer icons read from *Settings → Podcast* (Podcast Core Plugin)
- No web fonts to download: system font stacks, fast and privacy friendly
- Translation ready; Italian included

## Style variations

Pick one in *Appearance → Editor → Styles*:

| Variation | Look |
|---|---|
| Default | White, near-black text, indigo primary, coral accent |
| Midnight | Dark background, lavender primary, warm yellow accent |
| Paper | Warm cream, serif type, brick red and green |
| Studio | Black and white, yellow surfaces, uppercase headings |
| Lagoon | Deep teal and petrol blue on warm off-white, amber accent |

Every variation uses the same color slugs (`base`, `surface`, `contrast`, `muted`, `primary`, `secondary`, `accent`) and font slugs (`body`, `heading`, `mono`), so content keeps working when you switch.

## Patterns

Insertable (category *Podcast*): Hero, Listen on (platform buttons), Latest episodes, Latest news, Newsletter call to action.
Template content lives in hidden `template-*` patterns so that every string is translatable.

## Child themes

Override any template, part or pattern in a child theme (`Template: podcast-core-theme`). Useful hooks and classes:

- CSS classes: `.pct-hero`, `.pct-hero__media` (add `data-interval` in ms to change the slideshow speed), `.pct-card`, `.pct-episode-number`, `.pct-search-*`, `.pct-footer`
- Episode Player: custom properties on `.pc-player` (see the plugin README)
- Filter `podcast_core_theme_search_groups` to change the grouped search sections

## Requirements

- WordPress 6.7+
- PHP 8.1+
- Recommended: Podcast Core Plugin (without it, episode sections are simply hidden)

## License

GPL-2.0-or-later. See [LICENSE](LICENSE).
