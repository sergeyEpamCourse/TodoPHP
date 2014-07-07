(function($, undefined) {
    $(function() {

        var show = {
            "all": function() {
                $('[completed]').show();
            },
            "completed": function() {
                $('[completed]').hide();
                $("[completed='yes']").show();
            },
            "notCompleted": function() {
                $('[completed]').hide();
                $("[completed='no']").show();
            }
        };

        var nowDisplayTab = "all";

        //ToDo object
        function Todo(text) {
            this.text = text;
            this.completed = 'no';
        }

//      storage operation
        function setDatabaseTodoArr(arr) {
            $.post('saveTodo.php', {"todos": JSON.stringify(arr)});
        }

        function getDatabaseTodoArr() {
            $.ajaxSetup({
                async: false
            });

            var todoArr = [];
            $.post('getTodo.php', function(data) {
                try {
                    todoArr = JSON.parse(data);
                } catch (e) {
                    return todoArr;
                }
            });
            return todoArr;

            $.ajaxSetup({
                async: true
            });
        }

        function clearAll() {
            setDatabaseTodoArr([]);
        }

        function delTodo(index) {
            var todoArr = getDatabaseTodoArr();

            todoArr.splice(index, 1);
            setDatabaseTodoArr(todoArr);
        }

        function addTodoToStorage(inputTextArea, storageName) {
            var todoArr = getDatabaseTodoArr();
            var todoText = $(inputTextArea).val();
            var newTodo = new Todo(todoText);

            todoArr.unshift(newTodo);
            setDatabaseTodoArr(todoArr);
        }

        function addEditedTodoToStorage(inputTextArea) {
            var todoArr = getDatabaseTodoArr();
            var newText = $(inputTextArea).val();
            var index = getTodoIndex(inputTextArea);
            todoArr[index].text = newText;
            setDatabaseTodoArr(todoArr);
        }

        function changeCompleted(index) {
            var todoArr = getDatabaseTodoArr();

            if (todoArr[index].completed === 'yes')
                todoArr[index].completed = 'no';
            else
                todoArr[index].completed = 'yes';
            setDatabaseTodoArr(todoArr);
        }

        var editTodo = function(textEditor) {
            addEditedTodoToStorage(textEditor);
            display();
        };

        //on display
        function display() {
            displayTodoList("#todo_list");
            setCloseEvent(".close");
            setCompletedButtonEvent(".completedButton");
            setEditButtonEvent(".editButton");
            show[nowDisplayTab]();
            setEmptyTodoStyle();
        }

        function setEmptyTodoStyle() {
            var todoArrLength = $('.todos').length;
            if (todoArrLength === 0) {
                $("#todoApp").addClass("emptyTodo");
            } else {
                $("#todoApp").removeClass("emptyTodo");
            }
        }

        function getTodoIndex(elem) {
            return $(elem).parent()[0].getAttribute("todoIndex");
        }

        function displayTodoList(appendToElement) {
            var $appendElem = $(appendToElement).html("");

            $appendElem.append(createTodoHtmlList());
        }

        function editTodoForm(index) {
            var $todoElem = $('li[todoIndex="' + index + '"] > .todo_text');
            var todoText = $todoElem.text();

            var $todoEdit = $("<input type=\"text\" />").val(todoText);

            var $enterButton = $("<div class=\"enter\"><span class=\"enterName\">Enter</span></div>");

            $todoEdit.addClass("textEditor");

            $todoEdit.css({
                'width': '100%',
                'display': 'block'
            });

            $todoEdit = $todoEdit.add($enterButton);
            $todoElem.replaceWith($todoEdit);
            setEnterEvent(".enter", '.textEditor', editTodo);
        }

        function getTodoText(index) {
            return getDatabaseTodoArr()[index].text;
        }

        function createTodoHtmlList() {
            var todoArr = getDatabaseTodoArr();

            //underscope create todos
            var closeButton = '<span class="close">Close</span>';
            var completedButton = '<span class="completedButton">Completed</span>';
            var editButton = '<span class="editButton">Edit</span>';
            var todoText = '<div class="todo_text"><%=element.text %></div>';
            var templFunc = '<% _.each(arr, function(element, index) {%>';
            var templFuncEnd = '<% }); %>';
            var list = templFunc + '<li class="todos" todoIndex="<%=index %>" completed="<%=element.completed %>">' + todoText + closeButton + editButton + completedButton + '</li>' + templFuncEnd;
            var template = _.template(list);
            var html = template({
                arr: todoArr
            });

            return html;
        }

        //on close
        function setCloseEvent(elementGroup) {
            $(elementGroup).click(function(event) {
                var that = event.currentTarget;
                var index = getTodoIndex(that);

                delTodo(+index);
                display();

                event.stopImmediatePropagation();
                return false;
            });
        }

        function setCompletedButtonEvent(elementGroup) {
            $(elementGroup).click(function(event) {
                var that = event.currentTarget;
                var index = getTodoIndex(that);

                changeCompleted(+index);
                display();

                event.stopImmediatePropagation();
                return false;
            });
        }

        function setEditButtonEvent(elementGroup) {
            $(elementGroup).click(function(event) {
                var that = event.currentTarget;
                var index = getTodoIndex(that);

                display();
                editTodoForm(index);
                $(".textEditor")[0].focus();

                event.stopImmediatePropagation();
                return false;
            });
        }

        var addTodo = function(textEditor) {
            addTodoToStorage(textEditor, 'todos');
            display();
        };

        //on enter
        function setEnterEvent(enterButton, enterField, func) {
            $(enterButton).click(function(event) {
                func(enterField);

                event.stopImmediatePropagation();
                return false;
            });

            $(enterField).bind('keypress', function(e) {
                if (e.keyCode === 13) {
                    func(enterField);
                }
            });
        }

        //status buttons
        function activeButtonStyle(elem) {
            $('.navButton').removeClass('activeTab');
            $(elem).addClass('activeTab');
        }

        $("#allButton").click(function(event) {
            activeButtonStyle(event.currentTarget);

            nowDisplayTab = "all";
            show[nowDisplayTab]();

            event.stopImmediatePropagation();
            return false;
        });

        $("#activeButton").click(function(event) {
            activeButtonStyle(event.currentTarget);

            nowDisplayTab = "notCompleted";
            show[nowDisplayTab]();

            event.stopImmediatePropagation();
            return false;
        });

        $("#completedButton").click(function(event) {
            activeButtonStyle(event.currentTarget);

            nowDisplayTab = "completed";
            show[nowDisplayTab]();

            event.stopImmediatePropagation();
            return false;
        });

        $("#clearAllButton").click(function(event) {
            clearAll();
            display();
            nowDisplayTab = "all";
            show[nowDisplayTab]();

            event.stopImmediatePropagation();
            return false;
        });

        //on load
        setEnterEvent("#enter", '.mainTextEditor', addTodo);
        display();
        $("#allButton").click();

    });
})(jQuery);
