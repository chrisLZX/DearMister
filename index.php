<?php
// ##########################################################################################
//
// Copyright (c) 2012, Apps4Good. All rights reserved.
//
// Redistribution and use in source and binary forms, with or without modification, are
// permitted provided that the following conditions are met:
//
// 1) Redistributions of source code must retain the above copyright notice, this list of
//    conditions and the following disclaimer.
// 2) Redistributions in binary form must reproduce the above copyright notice, this list
//    of conditions and the following disclaimer in the documentation
//    and/or other materials provided with the distribution.
// 3) Neither the name of the Apps4Good nor the names of its contributors may be used to
//    endorse or promote products derived from this software without specific prior written
//    permission.
//
// THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
// EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
// OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT
// SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
// SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT
// OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
// HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR
// TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
// EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
//
// ##########################################################################################
session_start();
require_once('config.php');
require_once('lib/OAuth.php');
require_once('lib/Twitter.php');
?>
<html>
<head>
    <title><?php echo PAGE_TITLE; ?></title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen, projection"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sent").delay(5000).fadeOut();
            $("#error").delay(5000).fadeOut();
            $("#input").keyup(function (e) {
                 return validate(e);
            });
            validate();
        });
        function validate(e) {
            var prefix =  '<?php echo TWEET_PREFIX; ?>';
            var suffix = $('#handle').val();
            if (suffix.length > 0) {
                suffix = ' - @' + suffix;
            }
            var input = $('#input').val();
            if (input.length > 0) {
                $('#submit').removeAttr("disabled");
            }
            else {
                $('#submit').attr("disabled", "disabled");
            }
            var count = 140 - prefix.length - input.length - suffix.length;
            if (count < 140) {
                $('#count').html(count + " chars");
                $("#suffix").html(suffix);
                $('#tweet').val(prefix + input + suffix);
                return true;
            }
            return false;
        }
    </script>
</head>
<body>
<?php
include('submit.php');
include('tweets.php');
include('followers.php');
?>
</body>
</html>