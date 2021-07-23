import streamlit as st
import pickle
import numpy as np
import os
import librosa
from extract_mfcc import extract_features
from aya_format_recording import record


def load_model():
    path = "reciter_models/"
    gmm_files = [os.path.join(path, file_name) for file_name in os.listdir(path) if file_name.endswith('.gmm')]
    reciter_models = [pickle.load(open(file_name_name, 'r+b')) for file_name_name in gmm_files]
    return reciter_models


models = load_model()


def test_web():
    st.title("Reciter Detection")
    st.write("### Welcome to the Reciter Detection ")
    reciters = [reciter.split('.')[0] for reciter in os.listdir("reciter_models/")]
    uploaded_audio = st.file_uploader("Upload an audio file")
    if uploaded_audio:
        st.audio(uploaded_audio)
        signal, sr = librosa.load(uploaded_audio)
        print(signal.shape, sr)
        y = extract_features(signal, sr)
    if st.button("Record"):
        with st.spinner(f'Recording for {10} seconds ....'):
            record()
        st.success("Recording completed")
        st.audio("record.wav")
    if st.button('Detect'):
        if not uploaded_audio:
            signal, sr = librosa.load("record.wav")
            print(signal.shape, sr)
            y = extract_features(signal, sr)
        log_likelihood = np.zeros(len(models))
        for i in range(len(models)):
            gmm = models[i]  # checking with each model one by one
            scores = np.array(gmm.score(y))
            log_likelihood[i] = scores.sum()
        reciter = np.argmax(log_likelihood)
        st.markdown('**' + reciters[reciter] + '**' + " is the reciter detected in this recording.")
