function insertCodeIntoField({ get, props: { snippet, codeMirrorId, isAppend, skipInsert } }) {
  if (skipInsert) {
    return;
  }

  const codeMirrorInstance = jQuery(`#${codeMirrorId}`).next('.CodeMirror')[0].CodeMirror;

  // Insert code into specified codeMirror field.
  // Append or replace depending on user preferences.
  if (isAppend) {
    codeMirrorInstance.replaceRange(snippet, {line: codeMirrorInstance.lastLine()});
  } else {
    codeMirrorInstance.setValue(snippet);
  }
}

export {
  insertCodeIntoField,
};