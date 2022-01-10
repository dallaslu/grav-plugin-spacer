# Spacer Plugin

The **Spacer** Plugin is an extension for [Grav CMS](https://github.com/getgrav/grav). Use [spacer.js](https://github.com/dallaslu/spacer.js) to automatically add whitespace between East Asian and Latin scripts for typographical purpose.

## Installation

Installing the Spacer plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](https://learn.getgrav.org/advanced/grav-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install spacer

This will install the Spacer plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/spacer`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `spacer`. You can find these files on [GitHub](https://github.com/dallaslu/grav-plugin-spacer) or via [GetGrav.org](https://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/spacer
	
> NOTE: This plugin is a modular component for Grav which may require other plugins to operate, please see its [blueprints.yaml-file on GitHub](https://github.com/dallaslu/grav-plugin-spacer/blob/master/blueprints.yaml).

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/spacer/spacer.yaml` to `user/config/plugins/spacer.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
method: css
```

Note that if you use the Admin Plugin, a file with your configuration named spacer.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

## Usage

### Example

In a page:

```markdown
这是一条中文与English混排示例。
```

And it will be transformed in browser:

    这是一条中文与 English 混排示例。

### `method` options

case `css`:

    这是一条中文与&lt;spacer&gt;&lt;/spacer&gt;English&lt;spacer&gt;&lt;/spacer&gt;混排示例。

For more examples, visit ![spacer.js](https://dallaslu.github.io/spacer.js).