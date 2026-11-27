# Changelog

## 0.4.0 – unreleased
- Episode page: the video (if any) comes after the episode text, with the player alone at the top and a "Watch the video" card (episode image with a play sign), centred after the second block of text, that scrolls smoothly to the video, below the sticky player (Episode Video block, Podcast Core Engine 0.10).
- Hero: the image column goes from the top to the bottom edge of the hero (no rounded corners) and images are never cropped; the hero's vertical padding now applies to the text column. On small screens the image sits behind the text, on the right.
- Hero images can be chosen in **Podcast → Settings → Styles** (needs Podcast Core Engine 0.10): they replace the images placed in the hero template; more than one rotate with the crossfade.
- Header site title in the variation's heading font, extra bold (800).
- **Small screens**: the site title stays on one line, as big as the width allows; search (a search field) and the header sign-up button move into the mobile menu (it was meant to be hidden, but a core layout rule kept showing it and squeezed the title); the mobile menu has a see-through background that blurs the page and bigger, well spaced items; the hero image goes behind the text, on the right and smaller.
- The stylesheet URL changes whenever `style.css` changes (version + file time), so browsers never keep an outdated copy.
- Fix: headings with the Highlighted line style got the large padding core gives to headings with a background.
- **Series list pattern** (needs Podcast Core Engine 0.10): an editable title and the Series list block (main series or the sub-series of one series, with icons and number of episodes), with card and badge styles for `.pc-series`.
- **Partners pattern** (needs Podcast Core Engine 0.10): an editable title and the Partners block (logos, names, short texts), with card styles for `.pc-partner`.
- Single post: the author name, linked to the author page, is shown before the date and categories (author · date · categories).
- **Author page** (`author.html`): profile picture, name and biography (Users → Profile → Biographical Info), then the author's posts as a compact list (small image, title, date) with pagination. New pattern `podcast-core-studio/template-author`.
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
