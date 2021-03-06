Audit Log plugin for Craft CMS
=================

Plugin that allows you to log adding/updating/deleting of categories/entries/users.

Features:
 - Log Entries, Users and Categories
 - View exact details on what fields have changed
 - View who changed what on what page
 - Export an Audit Log CSV
 - Search, filter and use date ranges to find log entries
 - Has hooks that you can use to extend this plugin
   - getAuditLogTableAttributeHtml
   - modifyAuditLogTableAttributes
   - modifyAuditLogSortableAttributes
 
Roadmap:
 - Log more ElementTypes (Tags, Globals, Assets)
 
Important:
The plugin's folder should be named "auditlog"

Changelog
=================
###0.4.0###
 - Added the ability to download a csv of the log
 - Log more readable info, like Category Title & Group, Section Name and User Groups
 - Improved searching
 - Fixed date ranges not being accurate
 - Added a modifyAuditLogSortableAttributes hook

###0.3.0###
 - Removed ability to clear log - you can uninstall the plugin to do this
 - Added a date range selector
 - Made sorting work
 - Added modifyAuditLogTableAttributes and getAuditLogTableAttributeHtml hooks

Warning! This version is updated for Craft 2.3 and does NOT work on Craft 2.2

###0.2.8###
 - Fixed a bug where the user couldn't be shown in some cases

###0.2.7###
 - Fixed origin url in some cases

###0.2.6###
 - Better object parsing

###0.2.5###
 - Also parse logged objects to string
 - Also log user id when registrating

###0.2.4###
 - Also save section id for entry logs

###0.2.3###
 - Fixed a bug where the plugin didn't work on PHP 5.3

###0.2.2###
 - Added the ability to clear the log
 - Better fieldtype parsing
 - You can now easily go to origin
 - ID (and for Entries, Title) are also stored now

###0.2.1###
 - Fix "changes" url in CP - Thanks to Tim Kelty
 - Avoid Twig errors on array value - Thanks to Tim Kelty

###0.2.0###
 - Transformed AuditLog into an ElementType for easier sorting, filtering, searching and pagination

###0.1.0###
 - Initial push to GitHub