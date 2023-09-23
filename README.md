# group
WRITE UP

Introduction

Welcome to our blogging website, a platform designed to empower authors and content creators to share their stories with the world. In this guide, we will walk you through the various features and functionalities of our website, explaining how it works and how you can make the most of it.
Getting Started: Registration and Email Verification
The journey begins with the registration process. To create an account, a user needs to sign up with their email address. Upon entering their email and hitting the signup button, a verification email will be sent to the user’s Google account. This step is crucial to ensure that you are a real user and to protect the integrity of our platform.

Email Verification Process
When a user receives the verification email, click on the provided link to confirm your email address. We have used PHP Mailer to send and verify a user’s email address. The verification process uses a token that expires and once it expires it cannot be used again. Once your email is verified, you will be redirected back to the signup page to complete your registration.

User Profile Management
After successful registration, a user can build their user profile. The user can access and update their personal details at any time, making sure your information is accurate and up-to-date. This can be particularly helpful if the user has entered any incorrect details during the initial signup.

Signing In and Out
With your account set up, the user can now sign in using your registered email and password. Signing in grants you access to all the features of our platform. When the user is done using the website, they are able to sign out to ensure the security of your account.

Creating, Editing, and Deleting Articles
 As a registered user, you have the privilege to:

Create New Articles: Use our user-friendly interface to draft and publish your articles. Express your thoughts, share your expertise, and connect with your audience.

Edit Published Articles: When the author needs to make changes or updates to their published work, they can edit their articles even after they've been published.
Delete Articles: If you decide that a particular article no longer serves your purpose, you can easily delete it from your profile.

Email Verification Security
To maintain the integrity of our platform, we have implemented a security feature using a SQL table called 'verify.' This table contains a unique token associated with your email verification. This ensures that your account is protected and only accessible by you.


