const useconsosleApi = ()=>{
    const sum = 26;
    console.assert(sumi = 25, "Sum is not cacl right")
}

const useconsoleerror = () =>{
    const boolVar = false;
    if(boolVar){
        console.error("user can not acces");
    }
}

const useconsolelog = () =>{
    console.log("this is a log for user")
}//kete me larte jane funkisione
useconsosleApi();
useconsosleApi();

function clickMe(){
    setTimeout(
        () => {
           alert("hellooooo")
        },
        1000
    );
    
}

function usepromise(){
    const promise = new Promise(
        (resolve, rejec) => {
            setTimeout(
                () => {
                    console.log("mire eshte");
                    resolve(25);
                }, 2000
            )
        }
    ).then(
        (value) => {
            console.log("value is: ", value);
        }
    );
}

function usepromisereject(){
    promise = new Promise(
        (reject, resolve) => {
            setTimeout(
                () => {
                    console.log("state: Loading...");
                    resolve(2);
                }, 2000
            )
            }
    ).then(
        (r) => {
            new Promise(
                (reject, resolve) => {
                    setTimeout(
                        () => {
                            console.log("state: Processing...");
                            resolve(2);
                        }, 2000
                    )
                }
            ).then(

            setTimeout( 
                () => {
                    console.log("state: processed");
                }
            )
            )
        },2000
    
    )
}