# Podcast Core Theme

A block (full site editing) theme for podcast websites. Designed to work with [Podcast Core Plugin](https://github.com/rufusinfabula/podcast-core-plugin).

> Status: early development (0.2.0). Not ready for production.

## Features

- Home page: hero (with optional crossfade slideshow), latest episodes, latest news
- Episode page with the Podcast Core **Episode Player** block, series and previous/next links
- Episode archive and series archives with episode number on each card
- Search overlay in the header and search results **grouped by type** (episodes, news, pages)
- Platform buttons and footer icons read from *Settings → Podcast* (Podcast Core Plugin)
- System font stacks by default; the Elena variation uses bundled, self-hosted fonts (no external requests)
- Translation ready; Italian included

## Style variations

Pick one in *Appearance → Editor → Styles*:

| Variation | Look |
|---|---|
| Default | White, near-black text, indigo primary, coral accent |
| **Elena** | Petrol blue and teal on warm off-white, amber/brown/mauve/magenta accents; Montserrat + Literata; dark sticky episode player |
| **Chiara** (light) | White and soft grey, clear blue, warm amber accent |
| **Morgana** (dark) | Near-black, lavender primary, soft pink accent |
| **Viola** (vivid) | Electric violet, bright yellow, hot pink |
| **Rosa** (pastel) | Blush pink, mint, periwinkle on cream; dark text on pastel buttons |

Every variation uses the same 7 color slugs (`base`, `surface`, `contrast`, `muted`, `primary`, `secondary`, `accent`) and font slugs (`body`, `heading`, `mono`), so content keeps working when you switch. Elena adds extra accent colors (`accent-amber`, `accent-brown`, `accent-mauve`, `accent-magenta`, `accent-pink`, `neutral`) and the font families `montserrat`, `literata`, `recursive`.

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
