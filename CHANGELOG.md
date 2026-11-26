# Changelog

## 0.4.0 – unreleased
- **Renamed to Podcast Core Studio** (was Podcast Core Theme): theme folder `podcast-core-studio`, text domain and pattern prefix `podcast-core-studio/`. Works with Podcast Core Engine (was Podcast Core Plugin). Sites updating by hand: move saved styles and templates to the new theme slug and replace `podcast-core-theme/` with `podcast-core-studio/` in saved templates.

## 0.3.2 – unreleased
- Header: optional "Subscribe to the podcast" button (bell icon), shown only when the Email sign-up address is set in Settings → Podcast; hidden on small screens.

## 0.3.1 – unreleased
- "Email sign-up" pattern (was "Newsletter call to action"): invites listeners to get new episodes by email; the button links to the Email sign-up address set in Podcast Core Engine (Settings → Podcast).

## 0.3.0 – unreleased
- Patterns build their sections with the Podcast Core section blocks (Hero, Episodes, News, Call to action) when the plugin is active, falling back to Group blocks otherwise (`podcast_core_theme_section()`).
- Default colours and spacing of each section moved to `theme.json` (`styles.blocks.podcast-core/*`), editable in Design → Styles → Blocks.
- Rosa sets the Hero text colour through block styles.

## 0.2.5 – unreleased
- Hero vertical padding is now a block setting (Styles → Dimensions → Padding) instead of fixed CSS, and smaller by default (spacing 40 = 1.5rem). Older saved heroes without a padding setting get the same default.

## 0.2.4 – unreleased
- New block style **Highlighted line** for paragraphs and headings: big bold text on a palette-coloured band; the text colour adapts to the band (custom properties `onPrimary`, `onAccent` per variation).
- Hero uses three highlighted lines plus a visually hidden H1 with the site title.
- `.screen-reader-text` helper.

## 0.2.3 – unreleased
- Templates now contain the `<main>` group directly, with sections as separate patterns inside. The Site Editor uses `<main>` as the section root, so patterns and blocks can be dropped into any template (before, `<main>` was hidden inside a template pattern and drops were ignored).
- Removed the `template-front-page` pattern: the front page template lists Hero, Latest episodes and Latest news directly.

## 0.2.2 – unreleased
- New call-to-action patterns: Special series banner, Series spotlight with episodes, All series, Special episode.

## 0.2.1 – unreleased
- Sticky bar Episode Player is now the theme's default player design (all variations), defined in `style.css`.
- Variations no longer use custom CSS (`styles.css`): the Site Editor concatenated it when switching variations. Per-variation tweaks use `settings.custom` (`hero.*`, `episodeNumber`, `player.accent`, `player.icon`).
- Block refinements from Twenty Twenty-Five moved to `style.css`.

## 0.2.0 – unreleased
- Full template set: front page, blog, archive, episode, episode archive, series, search, 404, page, page without title.
- Patterns: hero (crossfade slideshow), platform links, latest episodes, latest news, newsletter CTA; hidden template patterns for translatable content.
- Header with site logo, navigation and search overlay; footer with platform icons and credit.
- Grouped search results (episodes, news, pages), filterable.
- Style variations: Elena (bundled Montserrat/Literata/Recursive, dark episode player), Chiara (light), Morgana (dark), Viola (vivid), Rosa (pastel).
- System font stacks by default; fonts bundled only for the Elena variation.
- Italian translation.

## 0.1.0 – unreleased
- Initial theme skeleton: style.css header, theme.json with neutral palette, header/footer parts, index template.
