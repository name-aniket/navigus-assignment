$(document).ready(function () {

    /**
     * 
     * @param {*} data
     * This method fill the details in the page. 
     */

    const _loadUsernameAndAvatar = (data) => {

        const _name = data.name;
        const _avatar = data.avatar;
        const _email = data.email;

        // Load image
        $('#avatar').attr('src', 'avatars/' + _avatar);

        // Display Name
        $('#name').append("Welcome " + _name);

        //Display Email
        $('#user-email').append(_email);

        $('#user-name').append(_name);
    }

    /**
    * Capture click event of logout anchor tag.
    * Call the _handleLogout function.
    */

    $('#logout').click(() => {
        _handleLogout();
    });

    $('#view-doc').click(() => {
        /**
         * Do user have permission to view doc.
         */
        _api_ = 'http://localhost/navigus-assignment/api/User/doUserHavePermission.php';

        $.get(_api_, (data) => {
            
            data = JSON.parse(data);

            if (data.status === 200) {
                viewDoc();
                /**
                 * poll the server every 30 sec to get the new list of user
                 * who are viewing the document
                 */
                let startPooling = setInterval(viewDoc, 30000);
            } else {
                _handleNoPermission(data.message);
            }
        });        
    });

    /**
     * Make a request to logout the user.
     * Made use of backend API.
     */

    const _handleLogout = () => {
        const _api_ = 'http://localhost/navigus-assignment/api/Logout/logout.php';

        $.get(_api_, (data) => {
            window.location = 'index.php';
        });
    }

    /**
     * This function makes get request and for basic details
     * of logged in user.
     * If something goes wrong then
     * logout the user.
     * Otherwise fill the details.
     * Used the backend API  
     */
    const getUsernameAndAvatar = () => {

        const _api_ = 'http://localhost/navigus-assignment/api/User/getUsernameAndAvatar.php';

        $.get(_api_, function (data) {

            data = JSON.parse(data)

            if (data.status == 200)
                _loadUsernameAndAvatar(data);
            else
                _handleLogout();

        });
    }

    /**
     * If the user has permission to view the doc
     * This function returns the list of active user
     * who are viewing this page.
     */
    const viewDoc = () => {
        _api_ = 'http://localhost/navigus-assignment/api/User/canViewDoc.php';

        $.get(_api_, (data) => {
            data = JSON.parse(data);
            if (data.status == 200)
                _generateUI(data.data);
        });
    }

    /**
     * This function generates UI dynamically.
     */

    const _generateUI = (data) => {
        let str = '';
        $.each(data, (key, value) => {
            str += '<li>';
            str += '<a href="#" data-toggle="tooltip" title="' + value.name + '"><img alt="" src="avatars/' + value.avatar + '"></a>';
            str += '</li>';
        });

        $('#list-active-user').html(str);

        str = '<div class ="row"><h3>Basic Document Example</h3></div>';
        str += '<div class ="row"><p>A dummy document that is being among the above specified list of user.</p></div>';
        str += '<div class ="row"><button class="btn btn-success btn-lg" id="last-viewed">Last Viewed </button></div>';

        $('#dummy-doc').html(str);
    }

    /**
     * 
     */
    const _handleNoPermission = (message) => {
        alert(message);
    }

    /**
     * This function fetches the list of all user who visited this document in the past.
     */
    const _getLastVisited = () => {

        const _api_ = 'http://localhost/navigus-assignment/api/User/getLastViewed.php';

        $.get(_api_, (data) => {
            data = JSON.parse(data);
            str = '<div class="row"><ul class="list-group">';
            $.each(data.data, (key, value) => {
                str += '<li class="list-group-item">' + value.name + ' visited last at ' + value.last_viewed + '</li>';
            });
            str += '</ul></div>';

            $('#list-log').html(str);

        });

    }

    /**
     * This event is fired when the user click the "Last Viewed" button
     */
    $(document).on('click', '#last-viewed', (event) => {
        _getLastVisited();
    });

    /**
     * This method is called when page get loaded.
     */

    getUsernameAndAvatar();

});
