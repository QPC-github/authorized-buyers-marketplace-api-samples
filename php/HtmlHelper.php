<?php

/**
 * Copyright 2022 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\AuthorizedBuyers\Marketplace\HtmlHelper;

/**
 * Helper functions for HTML generation.
 */

/**
 * Opens the HTML.
 * @param string $title the title of the page
 */
function printHtmlHeader($title)
{
    $htmlTitle = filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS);
    print '<!DOCTYPE html>';
    print '<html>';
    print "<head><title>$htmlTitle</title></head>";
    print '<link rel="stylesheet" href="style.css" type="text/css" />';
    print '<body>';
}

/**
 * Closes the HTML.
 */
function printHtmlFooter()
{
    print '</body>';
    print '</html>';
}

/**
 * Closes the HTML for samples.
 */
function printSampleHtmlFooter()
{
    print '<a href="index.php">Go back to samples list</a>';
    printHtmlFooter();
}

/**
 * Prints the index with links to the examples.
 * @param array $actions supported actions
 */
function printExamplesIndex($actions)
{
    foreach ($actions as $version => $versionResourcePaths) {
        print "<h1>$version</h1>";
        foreach ($versionResourcePaths as $versionResourcePath => $exampleNames) {
            printf('<h2>%s<h2>', str_replace('_', '.', $versionResourcePath));
            print '<ul class="nav">';
            foreach ($exampleNames as $exampleName) {
                $exampleClass = "\Google\Ads\AuthorizedBuyers\Marketplace\Examples\\$version" .
                    "\\$versionResourcePath\\$exampleName";

                print "<li><a class='highlight' href='?example=$exampleClass'>$exampleName</a></li>";
            }
            print '</ul>';
        }
    }
}
