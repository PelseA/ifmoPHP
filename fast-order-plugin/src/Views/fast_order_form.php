<div>
    <form method="post" action="/form/fastorder" >
        <table>
            <tr>
                <th><label for="article">Article number</label></th>
                <th><label for="quontity">Quontity</label></th>
            </tr>
            <tr>
                <th id="th_article"><p><input id="article" name="article_number[]" type="text" required></p></th>
                <th id="th_quontity"><p><input id="quontity" name="quontity[]" type="text" required></p></th>
            </tr>
        </table>
        <p id="warning_message"></p>
        <p>
            <input id="add_field" type="button" value="Add more articles">
            <input id="clear_fields" type="button" value="Clear fields">
            <input id="do_validate" type="submit" value="Make order">
        </p>
    </form>
</div>
<script type="text/javascript" src="/js/fast_order.js"></script>