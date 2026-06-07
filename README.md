# Simple Reading Time

A lightweight WordPress plugin that automatically displays estimated reading time on blog posts.

## Features

✅ Automatic word count calculation

✅ Estimated reading time display

✅ Custom Words Per Minute (WPM) setting

✅ Display before or after post content

✅ Lightweight and fast

✅ No external dependencies

✅ Beginner-friendly

---

## Screenshot

<img width="2940" height="1606" alt="image" src="https://github.com/user-attachments/assets/2b8bcfa0-30f7-4e2b-b411-c3e1f8aa72f1" />
<img width="2940" height="1454" alt="image" src="https://github.com/user-attachments/assets/e732949e-448d-4932-a924-b0df32d2b91d" />


Example Output:

📖 5 min read

---

## Installation

1. Download the plugin.
2. Upload the `simple-reading-time` folder to:

```
/wp-content/plugins/
```

3. Activate the plugin from **WordPress Admin → Plugins**.
4. Go to:

```
Settings → Reading Time
```

5. Configure:
   - Reading Speed (Words Per Minute)
   - Display Position

6. Save changes.

---

## Settings

| Setting | Description |
|----------|------------|
| Words Per Minute | Reading speed used for calculation |
| Display Position | Show reading time before or after content |

---

## How It Works

The plugin:

1. Counts the total words in a post.
2. Divides the count by the configured reading speed.
3. Calculates the estimated reading time.
4. Displays a simple reading time indicator.

Example:

```
1000 words ÷ 200 WPM = 5 min read
```

---

## Requirements

- WordPress 5.0+
- PHP 7.4+

---

## Changelog

### Version 1.0.0

- Initial Release
- Reading Time Calculation
- Reading Speed Settings
- Position Settings

---

## Roadmap

Planned features for future releases:

- Word Count Display
- Reading Progress Bar
- Shortcode Support
- Custom Icons
- Gutenberg Block
- Custom Text Labels
- Support for Custom Post Types

---

## Author

**NRW India**

Website: https://nrwone.in

Plugin Page: https://wp.nrwone.in

---

## License

GPL v2 or later

Licensed under the GNU General Public License.
