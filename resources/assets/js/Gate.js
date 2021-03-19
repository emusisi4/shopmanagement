export default class Gate{

    constructor(user){
        this.user = user;
    }


    isAdmin(){
        return this.user.type === '100';
    }

    isUser(){
        return this.user.type === 'user';
    }
    isAdminOrAuthor(){
        if(this.user.type === '1' || this.user.type === 'author'){
            return true;
        }

    }
    isAuthorOrUser(){
        if(this.user.type === 'user' || this.user.type === 'author'){
            return true;
        }

    }



}

