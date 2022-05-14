<?php

/*
 * This file is part of the PHP Input package.
 *
 * (c) Francesco Bianco <bianco@javanile.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Javanile\Imap2\Connection;
use Javanile\Imap2\Errors;
use Javanile\Imap2\Mail;
use Javanile\Imap2\Mailbox;
use Javanile\Imap2\Message;
use Javanile\Imap2\Thread;
use Javanile\Imap2\Polyfill;

if (!defined('OP_XOAUTH2')) {
    define('OP_XOAUTH2', 512);
}

/**
 * imap2_open
 */
if (!function_exists('imap_open')) {
    function imap_open($mailbox, $user, $password, $flags = 0, $retries = 0, $options = [])
    {
        return imap2_open($mailbox, $user, $password, $flags, $retries, $options);
    }
}
if (!function_exists('imap2_open')) {
    function imap2_open($mailbox, $user, $password, $flags = 0, $retries = 0, $options = [])
    {
        return Connection::open($mailbox, $user, $password, $flags, $retries, $options);
    }
}

/**
 * imap2_reopen
 */
if (!function_exists('imap_reopen')) {
    function imap_reopen($imap, $mailbox, $flags = 0, $retries = 0)
    {
        return Connection::reopen($imap, $mailbox, $flags, $retries);
    }
}
if (!function_exists('imap2_reopen')) {
    function imap2_reopen($imap, $mailbox, $flags = 0, $retries = 0)
    {
        return Connection::reopen($imap, $mailbox, $flags, $retries);
    }
}

/**
 * imap2_ping
 */
if (!function_exists('imap_ping')) {
    function imap_ping($imap)
    {
        return Connection::ping($imap);
    }
}
if (!function_exists('imap2_ping')) {
    function imap2_ping($imap)
    {
        return Connection::ping($imap);
    }
}

/**
 * imap2_close
 */
if (!function_exists('imap_close')) {
    function imap_close($imap, $flags = 0)
    {
        return Connection::close($imap, $flags);
    }
}
if (!function_exists('imap2_close')) {
    function imap2_close($imap, $flags = 0)
    {
        return Connection::close($imap, $flags);
    }
}

/**
 * imap2_timeout
 */
if (!function_exists('imap_timeout')) {
    function imap_timeout($timeoutType, $timeout = -1)
    {
        return Connection::close($timeoutType, $timeout);
    }
}
if (!function_exists('imap2_timeout')) {
    function imap2_timeout($timeoutType, $timeout = -1)
    {
        return Connection::close($timeoutType, $timeout);
    }
}

/**
 * imap2_check
 */
if (!function_exists('imap_check')) {
    function imap_check($imap)
    {
        return Mailbox::check($imap);
    }
}
if (!function_exists('imap2_check')) {
    function imap2_check($imap)
    {
        return Mailbox::check($imap);
    }
}

/**
 * imap2_status
 */
if (!function_exists('imap_status')) {
    function imap_status($imap, $mailbox, $flags)
    {
        return imap2_status($imap, $mailbox, $flags);
    }
}
if (!function_exists('imap2_status')) {
    function imap2_status($imap, $mailbox, $flags)
    {
        return Mailbox::status($imap, $mailbox, $flags);
    }
}

/**
 * imap2_num_msg
 */
if (!function_exists('imap_num_msg')) {
    function imap_num_msg($imap)
    {
        return imap2_num_msg($imap);
    }
}
if (!function_exists('imap2_num_msg')) {
    function imap2_num_msg($imap)
    {
        return Mailbox::numMsg($imap);
    }
}

/**
 * imap2_num_recent
 */
if (!function_exists('imap_num_recent')) {
    function imap_num_recent($imap)
    {
        return imap2_num_recent($imap);
    }
}
if (!function_exists('imap2_num_recent')) {
    function imap2_num_recent($imap)
    {
        return Mailbox::numRecent($imap);
    }
}

/**
 * imap2_list
 */
if (!function_exists('imap_list')) {
    function imap_list($imap, $reference, $pattern)
    {
        return imap2_list($imap, $reference, $pattern);
    }
}
if (!function_exists('imap2_list')) {
    function imap2_list($imap, $reference, $pattern)
    {
        return Mailbox::list($imap, $reference, $pattern);
    }
}

/**
 * imap2_listmailbox
 */
if (!function_exists('imap_listmailbox')) {
    function imap_listmailbox($imap, $reference, $pattern)
    {
        return imap2_listmailbox($imap, $reference, $pattern);
    }
}
if (!function_exists('imap2_listmailbox')) {
    function imap2_listmailbox($imap, $reference, $pattern)
    {
        return Mailbox::list($imap, $reference, $pattern);
    }
}

/**
 * imap2_listscan
 */
if (!function_exists('imap_listscan')) {
    function imap_listscan($imap, $reference, $pattern, $content)
    {
        return imap2_listscan($imap, $reference, $pattern, $content);
    }
}
if (!function_exists('imap2_listscan')) {
    function imap2_listscan($imap, $reference, $pattern, $content)
    {
        return Mailbox::listScan($imap, $reference, $pattern, $content);
    }
}

/**
 * imap2_scan
 */
if (!function_exists('imap_scan')) {
    function imap_scan($imap, $reference, $pattern, $content)
    {
        return imap2_scan($imap, $reference, $pattern, $content);
    }
}
if (!function_exists('imap2_scan')) {
    function imap2_scan($imap, $reference, $pattern, $content)
    {
        return Mailbox::listScan($imap, $reference, $pattern, $content);
    }
}

/**
 * imap2_scanmailbox
 */
if (!function_exists('imap_scanmailbox')) {
    function imap_scanmailbox($imap, $reference, $pattern, $content)
    {
        return imap2_scanmailbox($imap, $reference, $pattern, $content);
    }
}
if (!function_exists('imap2_scanmailbox')) {
    function imap2_scanmailbox($imap, $reference, $pattern, $content)
    {
        return Mailbox::listScan($imap, $reference, $pattern, $content);
    }
}

/**
 * imap2_getmailboxes
 */
if (!function_exists('imap_getmailboxes')) {
    function imap_getmailboxes($imap, $reference, $pattern)
    {
        return imap2_getmailboxes($imap, $reference, $pattern);
    }
}
if (!function_exists('imap2_getmailboxes')) {
    function imap2_getmailboxes($imap, $reference, $pattern)
    {
        return Mailbox::getMailboxes($imap, $reference, $pattern);
    }
}

/**
 * imap2_listsubscribed
 */
if (!function_exists('imap_listsubscribed')) {
    function imap_listsubscribed($imap, $reference, $pattern)
    {
        return imap2_listsubscribed($imap, $reference, $pattern);
    }
}
if (!function_exists('imap2_listsubscribed')) {
    function imap2_listsubscribed($imap, $reference, $pattern)
    {
        return Mailbox::listSubscribed($imap, $reference, $pattern);
    }
}

/**
 * imap2_lsub
 */
if (!function_exists('imap_lsub')) {
    function imap_lsub($imap, $reference, $pattern)
    {
        return imap2_lsub($imap, $reference, $pattern);
    }
}
if (!function_exists('imap2_lsub')) {
    function imap2_lsub($imap, $reference, $pattern)
    {
        return Mailbox::listSubscribed($imap, $reference, $pattern);
    }
}

/**
 * imap2_getsubscribed
 */
if (!function_exists('imap_getsubscribed')) {
    function imap_getsubscribed($imap, $reference, $pattern)
    {
        return imap2_getsubscribed($imap, $reference, $pattern);
    }
}
if (!function_exists('imap2_getsubscribed')) {
    function imap2_getsubscribed($imap, $reference, $pattern)
    {
        return Mailbox::getSubscribed($imap, $reference, $pattern);
    }
}

/**
 * imap2_subscribe
 */
if (!function_exists('imap_subscribe')) {
    function imap_subscribe($imap, $mailbox)
    {
        return imap2_subscribe($imap, $mailbox);
    }
}
if (!function_exists('imap2_subscribe')) {
    function imap2_subscribe($imap, $mailbox)
    {
        return Mailbox::subscribe($imap, $mailbox);
    }
}

/**
 * imap2_unsubscribe
 */
if (!function_exists('imap_unsubscribe')) {
    function imap_unsubscribe($imap, $mailbox)
    {
        return imap2_unsubscribe($imap, $mailbox);
    }
}
if (!function_exists('imap2_unsubscribe')) {
    function imap2_unsubscribe($imap, $mailbox)
    {
        return Mailbox::unsubscribe($imap, $mailbox);
    }
}

/**
 * imap2_createmailbox
 */
if (!function_exists('imap_createmailbox')) {
    function imap_createmailbox($imap, $mailbox)
    {
        return imap2_createmailbox($imap, $mailbox);
    }
}
if (!function_exists('imap2_createmailbox')) {
    function imap2_createmailbox($imap, $mailbox)
    {
        return Mailbox::createMailbox($imap, $mailbox);
    }
}

/**
 * imap2_create
 */
if (!function_exists('imap_create')) {
    function imap_create($imap, $mailbox)
    {
        return imap2_create($imap, $mailbox);
    }
}
if (!function_exists('imap2_create')) {
    function imap2_create($imap, $mailbox)
    {
        return Mailbox::createMailbox($imap, $mailbox);
    }
}

/**
 * imap2_deletemailbox
 */
if (!function_exists('imap_deletemailbox')) {
    function imap_deletemailbox($imap, $mailbox)
    {
        return imap2_deletemailbox($imap, $mailbox);
    }
}
if (!function_exists('imap2_deletemailbox')) {
    function imap2_deletemailbox($imap, $mailbox)
    {
        return Mailbox::deleteMailbox($imap, $mailbox);
    }
}

/**
 * imap2_renamemailbox
 */
if (!function_exists('imap_renamemailbox')) {
    function imap_renamemailbox($imap, $from, $to)
    {
        return imap2_renamemailbox($imap, $from, $to);
    }
}
if (!function_exists('imap2_renamemailbox')) {
    function imap2_renamemailbox($imap, $from, $to)
    {
        return Mailbox::renameMailbox($imap, $from, $to);
    }
}

/**
 * imap2_rename
 */
if (!function_exists('imap_rename')) {
    function imap_rename($imap, $from, $to)
    {
        return imap2_rename($imap, $from, $to);
    }
}
if (!function_exists('imap2_rename')) {
    function imap2_rename($imap, $from, $to)
    {
        return Mailbox::renameMailbox($imap, $from, $to);
    }
}

/**
 * imap2_mailboxmsginfo
 */
if (!function_exists('imap_mailboxmsginfo')) {
    function imap_mailboxmsginfo($imap)
    {
        return imap2_mailboxmsginfo($imap);
    }
}
if (!function_exists('imap2_mailboxmsginfo')) {
    function imap2_mailboxmsginfo($imap)
    {
        return Mailbox::mailboxMsgInfo($imap);
    }
}

/**
 * imap_search
 */
if (!function_exists('imap_search')) {
    function imap_search($imap, $criteria, $flags = SE_FREE, $charset = "")
    {
        return imap2_search($imap, $criteria, $flags, $charset);
    }
}
if (!function_exists('imap2_search')) {
    function imap2_search($imap, $criteria, $flags = SE_FREE, $charset = "")
    {
        return Message::search($imap, $criteria, $flags, $charset);
    }
}

/**
 * imap2_headers
 */
if (!function_exists('imap_headers')) {
    function imap_headers($imap)
    {
        return imap2_headers($imap);
    }
}
if (!function_exists('imap2_headers')) {
    function imap2_headers($imap)
    {
        return Message::headers($imap);
    }
}

/**
 * imap2_msgno
 */
if (!function_exists('imap_msgno')) {
    function imap_msgno($imap, $messageUid)
    {
        return imap2_msgno($imap, $messageUid);
    }
}
if (!function_exists('imap2_msgno')) {
    function imap2_msgno($imap, $messageUid)
    {
        return Message::msgno($imap, $messageUid);
    }
}

/**
 * imap2_uid
 */
if (!function_exists('imap_uid')) {
    function imap_uid($imap, $messageNum)
    {
        return imap2_uid($imap, $messageNum);
    }
}
if (!function_exists('imap2_uid')) {
    function imap2_uid($imap, $messageNum)
    {
        return Message::uid($imap, $messageNum);
    }
}

/**
 * imap2_sort
 */
if (!function_exists('imap_sort')) {
    function imap_sort($imap, $criteria, $reverse, $flags = 0, $searchCriteria = null, $charset = null)
    {
        return imap2_sort($imap, $criteria, $reverse, $flags, $searchCriteria, $charset);
    }
}
if (!function_exists('imap2_sort')) {
    function imap2_sort($imap, $criteria, $reverse, $flags = 0, $searchCriteria = null, $charset = null)
    {
        return Message::sort($imap, $criteria, $reverse, $flags, $searchCriteria, $charset);
    }
}

/**
 *
 */
if (!function_exists('imap_append')) {
    function imap_append($imap, $folder, $message, $options = null, $internalDate = null)
    {
        return imap2_append($imap, $folder, $message, $options, $internalDate);
    }
}
if (!function_exists('imap2_append')) {
    function imap2_append($imap, $folder, $message, $options = null, $internalDate = null)
    {
        return Mailbox::append($imap, $folder, $message, $options, $internalDate);
    }
}

/**
 * imap2_headerinfo
 */
if (!function_exists('imap_headerinfo')) {
    function imap4_headerinfo($imap, $messageNum, $fromLength = 0, $subjectLength = 0, $defaultHost = null)
    {
        return imap_headerinfo($imap, $messageNum, $fromLength, $subjectLength, $defaultHost);
    }
}
if (!function_exists('imap2_headerinfo')) {
    function imap2_headerinfo($imap, $messageNum, $fromLength = 0, $subjectLength = 0, $defaultHost = null)
    {
        return Message::headerInfo($imap, $messageNum, $fromLength, $subjectLength, $defaultHost);
    }
}

/**
 * imap2_header
 */
if (!function_exists('imap_header')) {
    function imap_header($imap, $messageNum, $fromLength = 0, $subjectLength = 0, $defaultHost = null)
    {
        return imap2_header($imap, $messageNum, $fromLength, $subjectLength, $defaultHost);
    }
}
if (!function_exists('imap2_header')) {
    function imap2_header($imap, $messageNum, $fromLength = 0, $subjectLength = 0, $defaultHost = null)
    {
        return Message::headerInfo($imap, $messageNum, $fromLength, $subjectLength, $defaultHost);
    }
}

/**
 * imap2_body
 */
if (!function_exists('imap_body')) {
    function imap_body($imap, $messageNum, $flags = 0)
    {
        return imap2_body($imap, $messageNum, $flags);
    }
}
if (!function_exists('imap2_body')) {
    function imap2_body($imap, $messageNum, $flags = 0)
    {
        return Message::body($imap, $messageNum, $flags);
    }
}

/**
 * imap2_fetchtext
 */
if (!function_exists('imap_fetchtext')) {
    function imap_fetchtext($imap, $messageNum, $flags = 0)
    {
        return imap2_fetchtext($imap, $messageNum, $flags);
    }
}
if (!function_exists('imap2_fetchtext')) {
    function imap2_fetchtext($imap, $messageNum, $flags = 0)
    {
        return Message::body($imap, $messageNum, $flags);
    }
}

/**
 * imap2_fetchbody
 */
if (!function_exists('imap_fetchbody')) {
    function imap_fetchbody($imap, $messageNum, $section, $flags = 0)
    {
        return imap2_fetchbody($imap, $messageNum, $section, $flags);
    }
}
if (!function_exists('imap2_fetchbody')) {
    function imap2_fetchbody($imap, $messageNum, $section, $flags = 0)
    {
        return Message::fetchBody($imap, $messageNum, $section, $flags);
    }
}

/**
 * imap2_bodystruct
 */
if (!function_exists('imap_bodystruct')) {
    function imap_bodystruct($imap, $messageNum, $section)
    {
        return imap2_bodystruct($imap, $messageNum, $section);
    }
}
if (!function_exists('imap2_bodystruct')) {
    function imap2_bodystruct($imap, $messageNum, $section)
    {
        return Message::bodyStruct($imap, $messageNum, $section);
    }
}

/**
 * imap2_savebody
 */
if (!function_exists('imap_savebody')) {
    function imap_savebody($imap, $file, $messageNum, $section = "", $flags = 0)
    {
        return imap2_savebody($imap, $file, $messageNum, $section, $flags);
    }
}
if (!function_exists('imap2_savebody')) {
    function imap2_savebody($imap, $file, $messageNum, $section = "", $flags = 0)
    {
        return Message::saveBody($imap, $file, $messageNum, $section, $flags);
    }
}

/**
 * imap2_fetchstructure
 */
if (!function_exists('imap_fetchstructure')) {
    function imap_fetchstructure($imap, $messageNum, $flags = 0)
    {
        return imap2_fetchstructure($imap, $messageNum, $flags);
    }
}
if (!function_exists('imap2_fetchstructure')) {
    function imap2_fetchstructure($imap, $messageNum, $flags = 0)
    {
        return Message::fetchStructure($imap, $messageNum, $flags);
    }
}

/**
 * imap2_fetchheader
 */
if (!function_exists('imap_fetchheader')) {
    function imap_fetchheader($imap, $messageNum, $flags = 0)
    {
        return imap2_fetchheader($imap, $messageNum, $flags);
    }
}
if (!function_exists('imap2_fetchheader')) {
    function imap2_fetchheader($imap, $messageNum, $flags = 0)
    {
        return Message::fetchHeader($imap, $messageNum, $flags);
    }
}

/**
 * imap2_fetch_overview
 */
if (!function_exists('imap_fetch_overview')) {
    function imap_fetch_overview($imap, $sequence, $flags = 0)
    {
        return imap2_fetch_overview($imap, $sequence, $flags);
    }
}
if (!function_exists('imap2_fetch_overview')) {
    function imap2_fetch_overview($imap, $sequence, $flags = 0)
    {
        return Message::fetchHeader($imap, $sequence, $flags);
    }
}

/**
 * imap2_fetchmime
 */
if (!function_exists('imap_fetchmime')) {
    function imap_fetchmime($imap, $messageNum, $section, $flags = 0)
    {
        return imap2_fetchmime($imap, $messageNum, $section, $flags);
    }
}
if (!function_exists('imap2_fetchmime')) {
    function imap2_fetchmime($imap, $messageNum, $section, $flags = 0)
    {
        return Message::fetchBody($imap, $messageNum, $section, $flags);
    }
}

/**
 * imap2_delete
 */
if (!function_exists('imap_delete')) {
    function imap_delete($imap, $messageNums, $flags = 0)
    {
        return imap2_delete($imap, $messageNums, $flags);
    }
}
if (!function_exists('imap2_delete')) {
    function imap2_delete($imap, $messageNums, $flags = 0)
    {
        return Message::delete($imap, $messageNums, $flags);
    }
}

/**
 * imap2_undelete
 */
if (!function_exists('imap_undelete')) {
    function imap_undelete($imap, $messageNums, $flags = 0)
    {
        return imap2_undelete($imap, $messageNums, $flags);
    }
}
if (!function_exists('imap2_undelete')) {
    function imap2_undelete($imap, $messageNums, $flags = 0)
    {
        return Message::undelete($imap, $messageNums, $flags);
    }
}

/**
 * imap2_clearflag_full
 */
if (!function_exists('imap_clearflag_full')) {
    function imap_clearflag_full($imap, $sequence, $flag, $options = 0)
    {
        return imap2_clearflag_full($imap, $sequence, $flag, $options);
    }
}
if (!function_exists('imap2_clearflag_full')) {
    function imap2_clearflag_full($imap, $sequence, $flag, $options = 0)
    {
        return Message::clearFlagFull($imap, $sequence, $flag, $options);
    }
}

/**
 * imap2_setflag_full
 */
if (!function_exists('imap_setflag_full')) {
    function imap_setflag_full($imap, $sequence, $flag, $options = 0)
    {
        return imap2_setflag_full($imap, $sequence, $flag, $options);
    }
}
if (!function_exists('imap2_setflag_full')) {
    function imap2_setflag_full($imap, $sequence, $flag, $options = 0)
    {
        return Message::clearFlagFull($imap, $sequence, $flag, $options);
    }
}

/**
 * imap2_mail_compose
 */
if (!function_exists('imap_mail_compose')) {
    function imap_mail_compose($envelope, $bodies)
    {
        return imap2_mail_compose($envelope, $bodies);
    }
}
if (!function_exists('imap2_mail_compose')) {
    function imap2_mail_compose($envelope, $bodies)
    {
        return Polyfill::mailCompose($envelope, $bodies);
    }
}

/**
 * imap2_mail_copy
 */
if (!function_exists('imap_mail_copy')) {
    function imap_mail_copy($imap, $message_nums, $mailbox, $flags = 0)
    {
        return imap2_mail_copy($imap, $message_nums, $mailbox, $flags);
    }
}
if (!function_exists('imap2_mail_copy')) {
    function imap2_mail_copy($imap, $message_nums, $mailbox, $flags = 0)
    {
        return Mail::copy($imap, $message_nums, $mailbox, $flags);
    }
}

/**
 * imap2_mail_move
 */
if (!function_exists('imap_mail_move')) {
    function imap_mail_move($imap, $messageNums, $mailbox, $flags = 0)
    {
        return imap2_mail_move($imap, $messageNums, $mailbox, $flags);
    }
}
if (!function_exists('imap2_mail_move')) {
    function imap2_mail_move($imap, $messageNums, $mailbox, $flags = 0)
    {
        return Mail::move($imap, $messageNums, $mailbox, $flags);
    }
}

/**
 * imap2_mail
 */
if (!function_exists('imap_mail')) {
    function imap_mail($to, $subject, $message, $additionalHeaders = null, $cc = null, $bcc = null, $returnPath = null)
    {
        return imap2_mail($to, $subject, $message, $additionalHeaders, $cc, $bcc, $returnPath);
    }
}
if (!function_exists('imap2_mail')) {
    function imap2_mail($to, $subject, $message, $additionalHeaders = null, $cc = null, $bcc = null, $returnPath = null)
    {
        return Mail::send($to, $subject, $message, $additionalHeaders, $cc, $bcc, $returnPath);
    }
}

/**
 * imap2_expunge
 */
if (!function_exists('imap_expunge')) {
    function imap_expunge($imap)
    {
        return imap2_expunge($imap);
    }
}
if (!function_exists('imap2_expunge')) {
    function imap2_expunge($imap)
    {
        return Message::expunge($imap);
    }
}

/**
 * imap2_gc
 */
if (!function_exists('imap_gc')) {
    function imap_gc($imap, $flags)
    {
        return imap2_gc($imap, $flags);
    }
}
if (!function_exists('imap2_gc')) {
    function imap2_gc($imap, $flags)
    {
        return Message::expunge($imap, $flags);
    }
}

/**
 * imap2_get_quota
 */
if (!function_exists('imap_get_quota')) {
    function imap_get_quota($imap, $quotaRoot)
    {
        return imap2_get_quota($imap, $quotaRoot);
    }
}
if (!function_exists('imap2_get_quota')) {
    function imap2_get_quota($imap, $quotaRoot)
    {
        return Message::expunge($imap, $quotaRoot);
    }
}

/**
 * imap2_set_quota
 */
if (!function_exists('imap_set_quota')) {
    function imap_set_quota($imap, $quotaRoot, $mailboxSize)
    {
        return imap2_set_quota($imap, $quotaRoot, $mailboxSize);
    }
}
if (!function_exists('imap2_set_quota')) {
    function imap2_set_quota($imap, $quotaRoot, $mailboxSize)
    {
        return Message::expunge($imap, $quotaRoot, $mailboxSize);
    }
}

/**
 * imap2_get_quotaroot
 */
if (!function_exists('imap_get_quotaroot')) {
    function imap_get_quotaroot($imap, $mailbox)
    {
        return imap2_get_quotaroot($imap, $mailbox);
    }
}
if (!function_exists('imap2_get_quotaroot')) {
    function imap2_get_quotaroot($imap, $mailbox)
    {
        return Message::expunge($imap, $mailbox);
    }
}

/**
 * imap2_getacl
 */
if (!function_exists('imap_getacl')) {
    function imap_getacl($imap, $mailbox)
    {
        return imap2_getacl($imap, $mailbox);
    }
}
if (!function_exists('imap2_getacl')) {
    function imap2_getacl($imap, $mailbox)
    {
        return Message::expunge($imap, $mailbox);
    }
}

/**
 * imap2_setacl
 */
if (!function_exists('imap_setacl')) {
    function imap_setacl($imap, $mailbox, $userId, $rights)
    {
        return imap2_setacl($imap, $mailbox, $userId, $rights);
    }
}
if (!function_exists('imap2_setacl')) {
    function imap2_setacl($imap, $mailbox, $userId, $rights)
    {
        return Message::expunge($imap, $mailbox, $userId, $rights);
    }
}

/**
 * imap2_thread
 */
if (!function_exists('imap_thread')) {
    function imap_thread($imap, $flags = SE_FREE)
    {
        return imap2_thread($imap, $flags);
    }
}
if (!function_exists('imap2_thread')) {
    function imap2_thread($imap, $flags = SE_FREE)
    {
        return Thread::thread($imap, $flags);
    }
}

/**
 * imap2_errors
 */
if (!function_exists('imap_errors')) {
    function imap_errors()
    {
        return imap2_errors();
    }
}
if (!function_exists('imap2_errors')) {
    function imap2_errors()
    {
        return Errors::errors();
    }
}

/**
 * imap2_last_error
 */
if (!function_exists('imap_last_error')) {
    function imap_last_error()
    {
        return imap2_last_error();
    }
}
if (!function_exists('imap2_last_error')) {
    function imap2_last_error()
    {
        return Errors::lastError();
    }
}

/**
 * imap2_alerts
 */
if (!function_exists('imap_alerts')) {
    function imap_alerts()
    {
        return imap2_alerts();
    }
}
if (!function_exists('imap2_alerts')) {
    function imap2_alerts()
    {
        return Errors::alerts();
    }
}

/**
 * imap2_8bit
 */
if (!function_exists('imap_8bit')) {
    function imap_8bit($string)
    {
        return imap2_8bit($string);
    }
}
if (!function_exists('imap2_8bit')) {
    function imap2_8bit($string)
    {
        return function_exists('imap_8bit') ? imap_8bit($string) : Polyfill::convert8bit($string);
    }
}

/**
 * imap2_base64
 */
if (!function_exists('imap_base64')) {
    function imap_base64($string)
    {
        return imap2_base64($string);
    }
}
if (!function_exists('imap2_base64')) {
    function imap2_base64($string)
    {
        return function_exists('imap_base64') ? imap_base64($string) : Polyfill::base64($string);
    }
}

/**
 * imap2_binary
 */
if (!function_exists('imap_binary')) {
    function imap_base64($string)
    {
        return imap2_binary($string);
    }
}
if (!function_exists('imap2_binary')) {
    function imap2_binary($string)
    {
        return function_exists('imap_binary') ? imap_binary($string) : Polyfill::binary($string);
    }
}

/**
 * imap2_mime_header_decode
 */
if (!function_exists('imap_mime_header_decode')) {
    function imap_mime_header_decode($string)
    {
        return Polyfill::mimeHeaderDecode($string);
    }
}
if (!function_exists('imap2_mime_header_decode')) {
    function imap2_mime_header_decode($string)
    {
        return imap_mime_header_decode($string);
    }
}

/**
 * imap2_mutf7_to_utf8
 */
if (!function_exists('imap_mutf7_to_utf8')) {
    function imap_mutf7_to_utf8($string)
    {
        return Polyfill::mutf7ToUtf8($string);
    }
}
if (!function_exists('imap2_mutf7_to_utf8')) {
    function imap2_mutf7_to_utf8($string)
    {
        return imap_mutf7_to_utf8($string);
    }
}

/**
 * imap2_qprint
 */
if (!function_exists('imap_qprint')) {
    function imap_qprint($string)
    {
        return Polyfill::qPrint($string);
    }
}
if (!function_exists('imap2_qprint')) {
    function imap2_qprint($string)
    {
        return function_exists('imap_binary') ? imap_binary($string) : Polyfill::binary($string);
    }
}

/**
 * imap2_rfc822_parse_adrlist
 */
if (!function_exists('imap_rfc822_parse_adrlist')) {
    function imap_rfc822_parse_adrlist($string, $defaultHostname)
    {
        return imap_rfc822_parse_adrlist($string, $defaultHostname);
    }
}
if (!function_exists('imap2_rfc822_parse_adrlist')) {
    function imap2_rfc822_parse_adrlist($string, $defaultHostname)
    {
        return function_exists('imap_binary') ? imap_binary($string) : Polyfill::binary($string, $defaultHostname);
    }
}

/**
 * imap2_rfc822_parse_headers
 */
if (!function_exists('imap_rfc822_parse_headers')) {
    function imap_rfc822_parse_headers($headers, $defaultHostname = 'UNKNOWN')
    {
        return imap_rfc822_parse_headers($headers, $defaultHostname);
    }
}
if (!function_exists('imap2_rfc822_parse_headers')) {
    function imap2_rfc822_parse_headers($headers, $defaultHostname = 'UNKNOWN')
    {
        return function_exists('imap_binary') ? imap_binary($string) : Polyfill::binary($string, $defaultHostname);
    }
}

/**
 * imap2_rfc822_write_address
 */
if (!function_exists('imap_rfc822_write_address')) {
    function imap_rfc822_write_address($mailbox, $hostname, $personal)
    {
        return imap_rfc822_write_address($mailbox, $hostname, $personal);
    }
}
if (!function_exists('imap2_rfc822_write_address')) {
    function imap2_rfc822_write_address($mailbox, $hostname, $personal)
    {
        return function_exists('imap_binary') ? imap_binary($string) : Polyfill::binary($string, $defaultHostname);
    }
}

/**
 * imap_utf7_decode
 */
if (!function_exists('imap_utf7_decode')) {
    function imap_utf7_decode($string)
    {
        return imap2_utf7_decode($string);
    }
}
if (!function_exists('imap2_utf7_decode')) {
    function imap2_utf7_decode($string)
    {
        return function_exists('imap_binary') ? imap_binary($string) : Polyfill::binary($string, $defaultHostname);
    }
}

/**
 * imap_utf7_encode
 */
if (!function_exists('imap_utf7_encode')) {
    function imap_utf7_encode($string)
    {
        return imap2_utf7_encode($string);
    }
}
if (!function_exists('imap2_utf7_encode')) {
    function imap2_utf7_encode($string)
    {
        return function_exists('imap_binary') ? imap_binary($string) : Polyfill::binary($string, $defaultHostname);
    }
}

/**
 * imap2_utf8_to_mutf7
 */
if (!function_exists('imap_utf8_to_mutf7')) {
    function imap_utf8_to_mutf7($string)
    {
        return imap2_utf8_to_mutf7($string);
    }
}
if (!function_exists('imap2_utf8_to_mutf7')) {
    function imap2_utf8_to_mutf7($string)
    {
        return function_exists('imap_binary') ? imap_binary($string) : Polyfill::binary($string, $defaultHostname);
    }
}

/**
 * imap2_utf8
 */
if (!function_exists('imap_utf8')) {
    function imap_utf8($string)
    {
        return imap2_utf8($string);
    }
}
if (!function_exists('imap2_utf8')) {
    function imap2_utf8(string $string)
    {
        return function_exists('imap_binary') ? imap_binary($string) : Polyfill::binary($string, $defaultHostname);
    }
}
