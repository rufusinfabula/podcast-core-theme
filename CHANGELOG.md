# Changelog

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
