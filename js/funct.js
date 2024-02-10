function createEventComponent() {
  var eventName = document.getElementById("eventNameInput").value;
  var eventDescription = document.getElementById("eventDescriptionInput").value;
  var joinLink = document.getElementById("joinLinkInput").value;
  var imageInput = document.getElementById("imageInput");

  // Create main container div
  var eventContainer = document.createElement("div");
  eventContainer.classList.add("offset-sm-1", "col-sm-5");

  // Create image element
  var imgElement = document.createElement("img");
  imgElement.classList.add("img-fluid");
  imgElement.alt = "";

  // Handle image input
  var file = imageInput.files[0];
  var reader = new FileReader();
  reader.onload = function (e) {
    imgElement.src = e.target.result;
  };
  reader.readAsDataURL(file);

  // Create event content container
  var eventContent = document.createElement("div");
  eventContent.classList.add("event-content");

  // Create input elements for event details
  var eventNameInput = document.createElement("input");
  eventNameInput.type = "text";
  eventNameInput.value = eventName;

  var eventDescriptionInput = document.createElement("input");
  eventDescriptionInput.type = "text";
  eventDescriptionInput.value = eventDescription;

  var joinLinkInput = document.createElement("input");
  joinLinkInput.type = "text";
  joinLinkInput.value = joinLink;

  // Append elements to event content container
  eventContent.appendChild(eventNameInput);
  eventContent.appendChild(document.createElement("br"));
  eventContent.appendChild(eventDescriptionInput);
  eventContent.appendChild(document.createElement("br"));
  eventContent.appendChild(joinLinkInput);
  eventContent.appendChild(document.createElement("br"));

  // Append elements to main container
  eventContainer.appendChild(imgElement);
  eventContainer.appendChild(eventContent);

  // Append the event component to the container in the HTML

  var container = document.getElementById("eventComponentContainer");
  container.appendChild(eventContainer);
}
