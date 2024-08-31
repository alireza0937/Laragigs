# API Documentation

## Listings

### 1. Get All Listings
- **Method**: GET
- **Endpoint**: `/`
- **Description**: Retrieves a list of all listings.
- **Authentication**: None

### 2. Create a New Listing
- **Method**: GET
- **Endpoint**: `/listings/create`
- **Description**: Displays the form to create a new listing.
- **Authentication**: Required

### 3. Store a New Listing
- **Method**: POST
- **Endpoint**: `/listings/done`
- **Description**: Stores a new listing in the database.
- **Authentication**: Required

### 4. Delete a Listing
- **Method**: DELETE
- **Endpoint**: `/listings/{listing}/delete`
- **Description**: Deletes a specific listing.
- **Authentication**: Required
- **Parameters**:
  - `{listing}`: The ID of the listing to be deleted.

### 5. Manage User Listings
- **Method**: GET
- **Endpoint**: `/listings/manage`
- **Description**: Displays a list of listings created by the authenticated user.
- **Authentication**: Required

### 6. Edit a Listing
- **Method**: GET
- **Endpoint**: `/listings/{listing}/edit`
- **Description**: Displays the form to edit a specific listing.
- **Authentication**: Required
- **Parameters**:
  - `{listing}`: The ID of the listing to be edited.

### 7. Update a Listing
- **Method**: PUT
- **Endpoint**: `/listings/{listing}`
- **Description**: Updates a specific listing in the database.
- **Authentication**: Required
- **Parameters**:
  - `{listing}`: The ID of the listing to be updated.

### 8. View a Listing
- **Method**: GET
- **Endpoint**: `/listings/{listing}`
- **Description**: Retrieves and displays a specific listing.
- **Authentication**: None
- **Parameters**:
  - `{listing}`: The ID of the listing to be viewed.

## User Authentication

### 9. Register User
- **Method**: GET
- **Endpoint**: `/user/register`
- **Description**: Displays the registration form for new users.
- **Authentication**: Must be a guest (not logged in)

### 10. Store Registered User
- **Method**: POST
- **Endpoint**: `/user/register/done`
- **Description**: Stores a new user in the database after registration.
- **Authentication**: None

### 11. Log Out User
- **Method**: POST
- **Endpoint**: `/logout`
- **Description**: Logs out the currently authenticated user.
- **Authentication**: Required

### 12. Display Login Form
- **Method**: GET
- **Endpoint**: `/user/login`
- **Description**: Displays the login form for users.
- **Authentication**: Must be a guest (not logged in)

### 13. Authenticate User
- **Method**: POST
- **Endpoint**: `/user/login/auth`
- **Description**: Authenticates and logs in a user based on credentials.
- **Authentication**: None
