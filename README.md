# Podcast Core Studio

A block (full site editing) theme for podcast websites. Designed to work with [Podcast Core Engine](https://github.com/rufusinfabula/podcast-core-engine).

> Status: early development (0.2.0). Not ready for production.

## Features

- Home page: hero (with optional crossfade slideshow), latest episodes, latest news
- Episode page with the Podcast Core **Episode Player** block, series and previous/next links
- Episode archive and series archives with episode number on each card
- Search overlay in the header and search results **grouped by type** (episodes, news, pages)
- Platform buttons and footer icons read from *Podcast → Settings → Podcast*
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

## Sections

With Podcast Core Engine active, the patterns use its section blocks: **Hero**, **Episodes section**, **News section**, **Call to action section**. Their spacing and colours for the whole site are in *Design → Styles → Blocks*; the plugin's **Sections** panel in the Site Editor switches sections on and off. Defaults live in `theme.json` under `styles.blocks`.

## Block styles

- **Highlighted line** (paragraph, heading): one block per line, each on a band coloured from the palette. Used by the Hero. The text colour follows the band; set a text colour on the block to override it.

## Patterns

Insertable (category *Podcast*): Hero, Listen on (platform buttons), Latest episodes, Latest news, Newsletter call to action, and series/episode calls to action:

- **Special series banner** – full-width banner with a button to a series archive
- **Series spotlight with episodes** – series intro plus its latest episodes (Query Loop filtered by series)
- **All series** – one card per series with description, episode count and archive link
- **Special episode** – one episode in the spotlight (latest of a series by default)

On insertion, links and filters point to the series with most episodes; change them in the editor.
Each template has its own `<main>` group (the Site Editor's section root, so new sections can be dropped in) and pulls translatable content from hidden `template-*` patterns.

## Child themes

Override any template, part or pattern in a child theme (`Template: podcast-core-studio`). Useful hooks and classes:

- CSS classes: `.pct-hero`, `.pct-hero__media` (add `data-interval` in ms to change the slideshow speed), `.pct-card`, `.pct-episode-number`, `.pct-search-*`, `.pct-footer`
- Episode Player: custom properties on `.pc-player` (see the plugin README)
- Filter `podcast_core_theme_search_groups` to change the grouped search sections
- Per-variation tweaks without custom CSS: `settings.custom` keys `hero.background`, `hero.text`, `hero.buttonBackground`, `hero.buttonText`, `hero.buttonHoverBackground`, `hero.buttonHoverText`, `episodeNumber`, `player.accent`, `player.icon`
- Avoid `styles.css` in style variations: the Site Editor appends it to the user's styles each time a variation is picked

## Requirements

- WordPress 6.7+
- PHP 8.1+
- Recommended: Podcast Core Engine (without it, episode sections are simply hidden)

## Credits

Developed by **[Fabio Ranfi Solutions](https://github.com/rufusinfabula)** (Fabio Ranfi, @rufusinfabula).

## License

GPL-2.0-or-later. See [LICENSE](LICENSE).
