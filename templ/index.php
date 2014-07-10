<!DOCTYPE html>
<html>

    <head>
        <title>Main</title>
        <?php
        include ('templ/common_parts/css.php');
        include ('templ/common_parts/jsLibs.php');
        ?>
        <script src="js/script.js"></script>
    </head>

    <body>
        <div id="todoApp">
            <div class="links">
                <div id="navLinks">
                    <?php
                    include ('templ/common_parts/links.php');
                    ?>
                    <span class="navButton" id="clearAllButton"> Clear All </span>
                </div>
            </div>
            <div id="add_todo">
                <div class="todo_content">
                    <input type="text" class="mainTextEditor" autofocus placeholder="Enter text here."/>
                    <div id="enter">
                        <span id="enterName">Enter</span>
                    </div>
                </div>
            </div>
            <div id="statusButton">
                <span class="navButton" id="allButton"> All </span>
                <span class="navButton" id="activeButton"> Active </span>
                <span class="navButton" id="completedButton"> Completed </span>
            </div>
            <ul id="todo_list"></ul>
        </div>

        <script type="text/template" id="templateId">
            <% _.each(arr, function(element, index) {%>
                <li class="todos" todoIndex="<%=index %>" completed="<%=element.completed %>">
                    <div class="todo_text"><%=element.text %></div>
                    <span class="close">Close</span>
                    <span class="editButton">Edit</span>
                    <span class="completedButton">Completed</span>
                </li>
            <% }); %>
        </script>
    </body>

</html>