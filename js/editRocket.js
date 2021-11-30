const editButtons = document.querySelectorAll(".rocket-edit-btn");
const rocketName = document.getElementById("rocket-edit-name");
const rocketId = document.getElementById("rocket-edit-id");
const rocketManufacturer = document.getElementById("rocket-edit-manufacturer");
const rocketHeight = document.getElementById("rocket-edit-height");
const rocketHumanRated = document.getElementById("rocket-edit-human-rated");
const rocketPayload = document.getElementById("rocket-edit-payload");

for (let i = 0; i < editButtons.length; i++) {
    const rocketData = JSON.parse(editButtons[i].dataset.rocket);
    editButtons[i].addEventListener("click", ()=>{
        rocketName.value=rocketData.name;
        rocketManufacturer.value=rocketData.manufacturer_id;
        rocketHeight.value=rocketData.height;
        rocketId.value=rocketData.id;
        rocketHumanRated.value=rocketData.human_rated ? 1 : 0;
        rocketPayload.value=rocketData.payload;
    });
}
