using System.Collections.Generic;
using UnityEngine;
using UnityEngine.XR.ARFoundation;

public class RayCastActionResolver : MonoBehaviour
{
    //The object that will be spawned if the raycast hits a "Ground" plane
    [SerializeField]
    private GameObject m_SpawnObject;

    //Retreive a reference to the AR Camera "Camera" Component
    [SerializeField]
    private Camera m_ARCamera;

    //Retrieve a reference to the AR Raycast Manager Component
    [SerializeField]
    private ARRaycastManager m_RaycastManager;

    //Store creeper spawn color
    [SerializeField]
    private Color m_CreeperSpawnColor = new Color(1f, 1f, 1f);

    //Store hit information of the raycast after hitting any object.
    private List<ARRaycastHit> m_RaycastHits = new List<ARRaycastHit>();

    //Keep track of creepers spawned
    public int numCreepers =0;

    public void SetSpawnColor(int colorIndex)
    {
        if (colorIndex == 1)
        {
            m_CreeperSpawnColor = Color.green;
        }
        else
        {
            m_CreeperSpawnColor = new Color(1.0f, 0.0f, 0.0f);
        }
    }

    void Update()
    {
        // Handle screen touches.
        if (Input.touchCount > 0)//oxi paratetameno aggigma, otan tin akoumpaei mia fora
        {
            //Obtain a Touch struct for a selected screen touch (for example, from a finger or stylus).
            Touch touch = Input.GetTouch(0);

            if (touch.phase == TouchPhase.Began)
            {
                Ray ray = m_ARCamera.ScreenPointToRay(touch.position);

                if (m_RaycastManager.Raycast(ray, m_RaycastHits))
                {
                    Pose pose = m_RaycastHits[0].pose;
                    GameObject spawn=Instantiate(m_SpawnObject, pose.position + Vector3.up, pose.rotation);
                    SkinnedMeshRenderer[] spawnRenderers = spawn.GetComponentsInChildren<SkinnedMeshRenderer>();
                    //spawn.GetComponent<MeshRenderer>().materials[0].color = m_CreeperSpawnColor;
                    for (int i = -0; i < spawnRenderers.Length; i++)
                    {
                        spawnRenderers[i].materials[0].color = m_CreeperSpawnColor;
                    }
                    numCreepers++;
                }
            }
        }
    }
}
