# SWG Authentication for WordPress

## Requirements
- **WordPress:** 5.0 or higher
- **PHP:** 7.4 or higher (tested up to PHP 8.4)
- **PHP OCI8 Extension:** Required for Oracle database connectivity
- **Oracle Database:** For SWG server data

## Features
- WordPress-based authentication for Star Wars Galaxies servers
- Oracle database integration via OCI8
- User account management and approval system
- Server metrics dashboard widget
- Resources browser with live data from game database
- Admin level management
- Secret key authentication support
- Comprehensive CSS customization system
- PHP 8.4 compatible
- WordPress coding standards compliant

## Installation
1. Upload the plugin files to the `wp-content/plugins/swg-auth/` directory or install the plugin through the WordPress Admin Panel.
2. Activate the plugin through the WordPress Admin Panel.
3. Configure database settings in SWG Auth -> Settings -> Database tab.
4. Get the SWG Server Config you need from SWG Auth -> Server Config.
5. Done!

## Configuration

### Database Settings
Navigate to **SWG Auth → Settings → Database** to configure your Oracle database connection:
- **Oracle Username:** Database username for connection
- **Oracle Password:** Database password (stored securely)
- **Oracle SID:** System identifier for your Oracle instance
- **Oracle IP Address:** Hostname or IP address of Oracle server
- **Oracle Port:** Database port (default: 1521)

The settings page will display connection status to help troubleshoot any issues.

### Authentication Settings
Navigate to **SWG Auth → Settings → General** to configure:
- **Account Approval:** Require manual approval for new accounts
- **Auth Type:** Choose between WebAPI or JsonWebAPI

## Security Notes
- Existing users should create a WordPress account with the **same username** they were using to access their existing characters
- **HTTPS is strongly recommended** to prevent plain text password transmission
- All database inputs are sanitized and validated
- Password fields use proper security attributes

## Changelog

### Version 0.16 (2026)
- **PHP 8.4 Compatibility:** Full support for PHP 8.4
- **WordPress Coding Standards:** Complete refactoring to follow WordPress coding standards
- **Enhanced Security:** 
  - Proper input sanitization for all database settings
  - Improved password field handling
  - Enhanced data validation and escaping
- **Better Error Handling:**
  - Comprehensive OCI error logging
  - Graceful degradation when OCI8 unavailable
  - Improved connection error messages
- **Code Quality:**
  - PHPDoc blocks for all functions
  - Internationalization ready
  - Improved code formatting and structure
  - Better resource cleanup in OCI operations
- **Database Tab Improvements:**
  - Port validation (1-65535)
  - Connection status indicators
  - Better field descriptions
  - Password field masking

### Previous Versions
See readme.txt for complete version history.

## Support
For issues, questions, or contributions, please refer to the plugin documentation.

## License
The Unlicense - https://unlicense.org
