<?php
//shortcode start
add_shortcode('wqs', 'l24bd_wqs_make_sortcode');
function l24bd_wqs_make_sortcode($atts)
{   // $options = shortcode_atts(array('headline' => ''), $atts);
    ?>
    <div ng-app="wqs">
        <div ng-controller="wqs_search_controller">
            <div id="wqs-searchBox">
                <input type="hidden" id="wqs_api_url" value="<?php echo getWqsApiUrl();?>">
                <input ng-model="query" type="text" id="wqs-searchinput"  placeholder="Search here..." clear-with-esc/>
                <div ng-click="query=null" id="wqs-clear" ng-show="query">&times;</div>
            </div>
            <!-- search result -->
            <div id="wqs-searchResult" ng-show="query">
                <div class="wqs-searchList">
                    <h4>Result found : <spane><%=(results|filter:query).length%></spane></h4>
                    <div ng-animate="'animate'" ng-repeat="item in results | filter:query | limitTo:8">
                        <div>
                            <a ng-href="<%=item.link %>">
                                <p><strong> <%=item.title%> </strong></p>
                            </a>
                            <p> Posted : <%=item.date%> </p>
                        </div>
                    </div>
                </div>
                <!-- end search result -->
            </div>
        </div>

    <?php
}
